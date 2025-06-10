<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'city',
        'zipcode',
        'address',
        'lat',
        'lang',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    protected $with = [];

    public function getFullAddressAttribute() 
    {
        return "$this->address $this->city";
    }
}
