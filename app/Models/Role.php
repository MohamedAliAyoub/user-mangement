<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected  $fillable = ["name"];

    /**
     * Find a role by its name.
     *
     * @param string $name
     * @return Role|null
     */
    public static function findByName($name): ?Role
    {
        return self::where('name', $name)->first();
    }

    public function users()
    {
        return $this->belongsToMany(User::class ,'role_user');
    }
}
