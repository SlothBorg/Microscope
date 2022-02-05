<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function creator()
    {
        return User::findOrFail($this->creator_id)->first();
    }

    public function isCreator(User $user) : bool
    {
        return $this->creator_id === $user->id;
    }

    public function hasUser(User $user) : bool
    {
        if ($this->isCreator($user)) {
            return true;
        } else {
            return (bool) $this->users()->where('username', $user->username)->count();
        }
    }

    public function addUser(User $user)
    {
        return $this->users()->attach($user->id);
    }

    public function removeUser(User $user)
    {
        return $this->users()->detach($user);
    }
}
