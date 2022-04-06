<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    public function getModel(): User
    {
        return new User();
    }

    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->getModel()->withTrashed('roles')->orderBy('id', 'Desc')->paginate(8);
    }

    public function roleToUser(): Collection
    {
        $roles = Role::orderBy('name')->get();

        return $roles;
    }

    public function updateUser(Request $data, User $user): User
    {
        $user->update($data->all());

        $user->roles()->sync($data->get('roles'));

        return $user;
    }
}
