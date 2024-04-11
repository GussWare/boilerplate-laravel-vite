<?php

namespace App\Repositories;

use App\Models\User;
use App\Dtos\UserDto;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function findAll()
    {
        return User::all();
    }

    public function findById(int $id)
    {
        return User::with('channels', 'categories')->find($id);
    }

    public function findByCategories($categories)
    {
        $query =  User::with('channels')
            ->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('categories.id', $categories);
            })->get();

        return $query;
    }

    public function create(UserDto $obj)
    {
        $data = $obj->toArray();
        return User::create($data);
    }

    public function update(int $id, UserDto $obj)
    {
        $data = $obj->toArray();
    
        $user = User::find($id);
        $user->update($data);
    
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function associateChannels($user, $channels)
    {
        $user->channels()->sync($channels);
    }

    public function associateCategories($user, $categories)
    {
        $user->categories()->sync($categories);
    }
}
