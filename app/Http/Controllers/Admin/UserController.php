<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormUserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $UserRepo;

    public function __construct(UserRepository $UserRepo)
    {
        $this->UserRepo = $UserRepo;
    }

    public function index()
    {
        $users = $this->UserRepo->allUsers();

        return view('backend.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = $this->UserRepo->getRoles();
        return view('backend.users.create', [
            'roles' => $roles
        ]);
    }

    public function store(FormUserRequest $request)
    {
        $validated = $request->validated();
        $validated['admin_id'] = auth()->user()->id;

        $this->UserRepo->storeUser($validated);

        return redirect()->route('users.index')
            ->with('alert.success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $roles = $this->UserRepo->getRoles();
        $user = $this->UserRepo->findUser($id);

        return view('backend.users.edit', [
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function update(FormUserRequest $request, $id)
    {
        $validated = $request->validated();

        $this->UserRepo->updateUser($validated, $id);

        return redirect()->route('users.index')
            ->with('alert.success', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $this->UserRepo->destroyUser($id);

        return redirect()->route('users.index')
            ->with('alert.success', 'User Deleted Successfully');
    }
}
