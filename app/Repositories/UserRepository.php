<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class UserRepository
{
    public function allUsers()
    {
        $current_user = auth()->user();
        return User::where('admin_id', $current_user->id)->latest()->paginate(10);
    }

    public function storeUser($data)
    {
        $user = User::create($data);
        $user->roles()->attach($data['role_id']);
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($data, $id)
    {
        $user = User::findOrFail($id);
        $data['password'] = $data['password'] ?? $user['password'];

        $user->update($data);
        $user->roles()->sync($data['role_id']);
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function getRoles()
    {
        return Role::all();
    }
}
