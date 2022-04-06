<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserUpdateRequest;
use App\MercatodoModels\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $usersRepo;

    public function __construct(UserRepository $usersRepository)
    {
        $this->usersRepo = $usersRepository;
    }

    public function index(): View
    {

        $users = $this->usersRepo->getAllUsers();

        return view('user.index', compact('users'));
    }

    public function show(User $user): View
    {
        $this->authorize('view', [$user, ['user.show','userown.show']]);

        $roles = $this->usersRepo->roleToUser();

        return view('user.view', compact('roles', 'user'));
    }

    public function edit(User $user): View
    {
        $this->authorize('update', [$user, ['user.edit','userown.edit']]);

        $roles = $this->usersRepo->roleToUser();

        return view('user.edit', compact('roles', 'user'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $this->usersRepo->updateUser($request, $user);

        return redirect()->route('user.index')
            ->with('status_success', 'user update successfully');
    }
}