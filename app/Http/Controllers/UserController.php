<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Facultad;
use Spatie\Permission\Models\Role;
use Flash;
use Response;


class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
{
    $facultades = Facultad::pluck('nombreFacu', 'id');
    return view('users.create', compact('facultades'));
}
    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password']= Hash::make($input['password']);

        $user = $this->userRepository->create($input);
        $user->assignRole($request->role);


        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */

public function edit($id)
{
    $user = $this->userRepository->find($id);

    if (empty($user)) {
        Flash::error('User not found');
        return redirect(route('users.index'));
    }

    $facultades = Facultad::pluck('nombreFacu', 'id');

    return view('users.edit', compact('user', 'facultades'));
}

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);
    
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('users.index'));
        }
    
        $input = $request->all();
    
        // Verifica si se proporcionó una nueva contraseña en el formulario
        if (!empty($input['password'])) {
            // Encripta la nueva contraseña antes de guardarla
            $input['password'] = Hash::make($input['password']);
        } else {
            // Si no se cambió la contraseña, quita el campo 'password' del array de entrada
            unset($input['password']);
        }
    
        // Actualiza los datos del usuario
        $user = $this->userRepository->update($input, $id);
    
        // Sincroniza el rol del usuario con el nuevo rol seleccionado en el formulario
        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }
    
        Flash::success('User updated successfully.');
        return redirect(route('users.index'));
    }
    

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
