<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersIndex extends Component
{
    use WithPagination;
   
    public $search='';
    protected $listeners=['render'];
   
    protected $paginationTheme = 'bootstrap';
  
    protected $queryString = [
       
        'search'
    ];
   
    public function cambiarEstado($usuarioId)
    {
        $usuario = User::find($usuarioId); 

        if ($usuario) {
            $usuario->estado = $usuario->estado ? 0 : 1;
            $usuario->save();
        }
         $this->emit('alert','Se cambio el estado de la convocatoria con éxito');
    }
    public function updatingSearch(){
        $this->resetPage();
    }
//EDITAR USUARIO

  public function rules()
    {
        return [

             'ci2' => 'required|integer',
             'nombre2' => 'required|string|max:255',
        
       
'paterno2' => 'required|string|max:255',
        'materno2' => 'required|string|max:255',
        
       
'email2' => 'required|email|max:255|unique:users,email,' . $this->id_user_actual,
        'role2' => 'required|not_in:Elegir...',
        ];
    }

      public function updated($propertyName){
        $this->validateOnly($propertyName);
    
      }
    public $nombre2;
    public $paterno2;
    public $materno2;
    public $email2;
    public $password2;
    public $role2;
    public $id_user_actual;
    public $ci2;

    public function editar_usuario(User $id_user){

$this->ci2 = $id_user->ci;
$this->nombre2 = $id_user->name;
$this->paterno2 = $id_user->paterno;
$this->materno2 = $id_user->materno;
$this->email2 = $id_user->email;
$this->id_user_actual = $id_user->id;
$this->role2 = $id_user->roles[0]->id;


    }
    public function cancelarEditar(){
        $this->reset([
            'ci2',
            'nombre2',
            'paterno2',
            'email2',
            'materno2',
            'role2',

   
        ]);

    }
    
    public function guardarEditarUsuario(){
    $this->validate();
$editar_user = User::find($this->id_user_actual);

        $editar_user->fill([
            
            'name'          => $this->nombre2,
            'paterno'          => $this->paterno2,
            'materno'          => $this->materno2,

           
            'email'          => $this->email2,
            'ci'          => $this->ci2,
           
            
            
        ]);

        $editar_user->save();
   $editar_user->roles()->detach();
    $newRole = Role::findOrFail($this->role2);
    
   
$editar_user->assignRole($newRole);

$this->cancelarEditar();
  $this->emit('closeModalEdit');
        
        $this->emit('alert', 'Se editó satisfactoriamente');

    }

    //Resetear contraseña
  
    public $nombreCompleto;
    public $PasswordEdit;
    public $UserEditPassword;
    public function resetPassword($id){
         
        $user = User::findOrFail($id);
        $this->PasswordEdit ='SIADI_'.$user->ci;
        $this->nombreCompleto= $user->name.' '.$user->paterno.' '.$user->materno; 
          $this->UserEditPassword=$user->id;  
          $this->emit('abrirmodaleditpassword');

    }
    public function guardarResetPassword(){
   
     $editar_user_password = User::find($this->UserEditPassword);

        $editar_user_password->fill([
            
          
            'password'          => bcrypt($this->PasswordEdit) 
           
            
             
        ]);

        $editar_user_password->save();
       $this->emit('alert','Se actualizo su contraseña. Password:'. $this->PasswordEdit) ;
       $this->emit('cerrarmodaleditpassword')  ;  
       $this->cancelarResetPassword(); 

     }
    public function cancelarResetPassword(){
$this->reset([
    'nombreCompleto','PasswordEdit'
]);
    }
  

    public function render()
    {
        $roles=Role::all();
        $users = User::where('name', 'LIKE', '%'. $this->search . '%')
        
        ->orWhere('paterno', 'LIKE', '%'. $this->search . '%')
        ->orWhere('materno', 'LIKE', '%'. $this->search . '%')
        ->orWhere('email', 'LIKE', '%'. $this->search . '%')
        ->orWhere('ci', 'LIKE', '%'. $this->search . '%')
        ->latest('id')
        ->paginate(5);
        return view('livewire.admin.users-index', compact('users','roles'));
    }
}
