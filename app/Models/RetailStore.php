<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailStore extends Model
{
    use HasFactory;

    /**
     * Get the parcels of the store.
     */
    public function parcels()
    {
        return $this->hasMany(Parcel::class);
    }

    /**
     * Get the region of the store.
     */
    public function region()
    {
        return $this->hasOne(Region::class);
    }
}
