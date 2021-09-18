<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleUserRequest;
use App\Http\Requests\UpdateRoleUserRequest;
use App\Repositories\RoleUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Notifications\SendPassword;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Flash;
use Response;
use Carbon\Carbon;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class RoleUserController extends AppBaseController
{
    /** @var  RoleUserRepository */
    private $roleUserRepository;
    protected $authUser;

    public function __construct(RoleUserRepository $roleUserRepo,Request $request)
    {
        //$this->middleware(['verified','auth']);
        $this->middleware('rol:admin|root');
        $this->roleUserRepository = $roleUserRepo;
    }

    /**
     * Display a listing of the RoleUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleUserRepository->paginate(10);

        return view('roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new RoleUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created RoleUser in storage.
     *
     * @param CreateRoleUserRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleUserRequest $request)
    {

        $input = $request->all();
        $input['password']=Hash::make($input['password']); //modificamos para que vaya con hash
        $input['password_changed_at'] = Carbon::now()->add(366, 'day')->toDateTimeString(); //para que cambie la clave

        $roleUser = $this->roleUserRepository->create($input);
        //marcamos la cuenta como verificada ya que al correo llega la contraseña
        $roleUser->markEmailAsVerified();

        //asignamos perfil de usuario normal
        $roleUser->roles()->attach(Role::where('name', 'user')->first());
        $roleUser->notify(new SendPassword($request->password));

        Flash::success(__('messages.saved_send', ['model' => __('models/roles.singular')]))->important();

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified RoleUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]))->important();

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roleUser', $roleUser);
    }

    /**
     * Show the form for editing the specified RoleUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if($this->validaSuperUsuarios($roleUser))
            return redirect(route('roles.index'));

        $allRoles = \App\Role::where('name', '!=' , 'root')->pluck('description','id_role');
        $selectedRoles = $roleUser->roles()->get()->pluck('id_role');

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]))->important();

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with(['roleUser' => $roleUser,
                                        'allRoles' => $allRoles,
                                        'selectedRoles' => $selectedRoles
                                        ]);
    }

    /**
     * Update the specified RoleUser in storage.
     *
     * @param int $id
     * @param UpdateRoleUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleUserRequest $request)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if($this->validaSuperUsuarios($roleUser))
            return redirect(route('roles.index'));

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]))->important();

            return redirect(route('roles.index'));
        }

        $roleUser = $this->roleUserRepository->update($request->all(), $id);

        $roleUser->roles()->sync($request->roles); //permite actualizar el perfil en la tabla de muchos a muchos

        Flash::success(__('messages.updated', ['model' => __('models/roles.singular')]))->important();

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified RoleUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if($this->validaSuperUsuarios($roleUser))
            return redirect(route('roles.index'));

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]))->important();

            return redirect(route('roles.index'));
        }
        
        //eliminamos la relacion
        $roleUser->roles()->detach();
        //eliminamos el principal
        $this->roleUserRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/roles.singular')]))->important();

        return redirect(route('roles.index'));
    }


    public function validaSuperUsuarios($roleUser){
        //valida que nadie pueda utilizar este usuario
        if($roleUser->hasAnyRole('root')){
            abort_unless(false, 401);
        }

        //que tenga usuario admin y que quiera modificar otra cuenta con usuario admin
        if(\Auth::user()->roles()->first()->name == "admin" && $roleUser->hasAnyRole('admin')){
            Flash::error(__('Solo el usuario root puede modificar cuentas con rol admin'))->important();
            return true;
        }
        return false;
    }

}
