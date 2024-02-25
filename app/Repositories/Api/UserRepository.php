<?php

namespace App\Repositories\Api;

use App\Models\User;

class UserRepository
{
    public function apiUser()
    {
        return User::whereNull('admin_id');
    }

    public function allUsers()
    {
        return $this->apiUser()->get();
    }

    public function storeUser($data)
    {
        $user = User::create($data);
        $user->roles()->attach(4); //student role

        return $user;
    }

    public function findUser($id)
    {
        $user = $this->apiUser()->where('id', $id)->first();
        return $user;
    }

    public function updateUser($data, $id)
    {
        $user = $this->apiUser()->where('id', $id)->first();
        $data['password'] = $data['password'] ?? $user['password'];
        $user->update($data);

        return $user;
    }

    public function destroyUser($id)
    {
        return  $this->apiUser()->where('id', $id)->first();
    }
}
