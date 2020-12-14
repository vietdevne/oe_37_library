<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::paginate(config('app.paginate'));
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function getQuerySearch($fullname, $role)
    {
        return User::query()->fullname($fullname)->role($role)
            ->paginate(config('app.paginate'));
    }

    public function create($attributes = []) 
    {

    }

    public function update($id, $attributes = [])
    {
        $user = User::find($id);
        if($user){
            $user->update($attributes);
            
            return true;
        }
        
        return false;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();

            return true;
        }

        return false;
    }

    public function userCountByMonth($month){
        return User::whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', $month)
                    ->count('user_id');
    }
}
