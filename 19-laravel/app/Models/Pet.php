<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Pet extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'active',
        'status'
    ];
    // RelationShip
    // Pet has one adoption
    public function adoption() {
        return $this->hasOne(Adoption::class);
    }
    public function scopeNames($query, $q) {
        if (trim($q)) {
            $query->where('name', 'LIKE', "%$q%")
                  ->orWhere('kind', 'LIKE', "%$q%")
                  ->orWhere('breed', 'LIKE', "%$q%");
        }
    }
}
