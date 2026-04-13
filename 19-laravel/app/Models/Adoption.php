<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $fillable = [
        'user_id',
        'pet_id'
    ];
    // RelationShip
    // Adoption belongs to one user
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Adoption belongs to one pet
    public function pet() {
        return $this->belongsTo(Pet::class);
    }
    public function scopeNames($query, $q) {
        if (trim($q)) {
            $query->whereHas('user', function ($query) use ($q) {
                $query->where('fullname', 'LIKE', "%$q%");
            })->orWhereHas('pet', function ($query) use ($q) {
                $query->where('name', 'LIKE', "%$q%");
            });
        }
    }
}
