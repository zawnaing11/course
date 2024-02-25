<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiUserRequest;
use App\Repositories\Api\UserRepository;

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

        return response()->json($users);
    }

    public function store(ApiUserRequest $request)
    {
        $validated = $request->validated();
        $user = $this->UserRepo->storeUser($validated);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = $this->UserRepo->findUser($id);

        return response()->json($user);
    }

    public function update(ApiUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = $this->UserRepo->updateUser($validated, $id);

        return response()->json($user, 201);
    }

    public function destroy($id)
    {
        $user = $this->UserRepo->destroyUser($id);
        $user->delete();

        return response()->json(204);
    }
}
