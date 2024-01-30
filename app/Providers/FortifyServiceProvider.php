<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use App\Models\AdministracionModulos\SiadiPersona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);



        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            # pregunta si el usuario no tiene persona
            if ($user && $user->estado == 1 && is_null($user->persona) && Hash::check($request->password, $user->password)) {
                return $user;
                # si tiene usuario y este no tiene correo en su siadi_persona
            } elseif ($user && $user->estado == 1 && (is_null($user->persona->email_persona) || trim($user->persona->email_persona) == "") && Hash::check($request->password, $user->password)) {
                return $user;
            } elseif ($user && $user->estado == 0) {
                throw ValidationException::withMessages([
                    'email' => 'Su cuenta a sido Bloqueada. contactese con el SIE',
                ]);
            }

            # si tiene correo en su usuario entonces se compara con su correo de siadi_persona
            $persona = User::join('siadi_personas', 'siadi_personas.id_siadi_persona', '=', 'users.id_persona_siadi')
                ->select(
                    'users.id',
                    'users.password',
                    'users.estado',
                    'users.name',
                    'users.paterno',
                    'users.materno',
                    'users.id_persona_siadi',
                    'users.ci',
                    'users.id_persona',
                    'siadi_personas.email_persona',
                    'users.profile_photo_path'
                )
                ->where('siadi_personas.email_persona', $request->email)->first();
            if ($persona && $persona->estado == 1  && Hash::check($request->password, $persona->password)) {
                return $persona;
            } elseif ($persona && $persona->estado == 0) {
                throw ValidationException::withMessages([
                    'email' => 'Su cuenta a sido Bloqueada. contactese con el SIE',
                ]);
            }

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
