<?php

namespace App\Repositories\User;

use App\Exports\UsersExport;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserRepository extends BaseRepository
{
    public function getModel(): User
    {
        return new User();
    }

    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->getModel()->withTrashed('roles')->orderBy('id', 'Asc')->paginate(8);
    }

    public function roleToUser(): Collection
    {
        $roles = Role::orderBy('id')->get();

        return $roles;
    }

    public function updateUser(Request $data, User $user): User
    {
        $user->update($data->all());

        $user->roles()->sync($data->get('roles'));

        return $user;
    }

    public function usersExport(): BinaryFileResponse
    {
        return (new UsersExport())->download('users.xlsx');
    }
}
