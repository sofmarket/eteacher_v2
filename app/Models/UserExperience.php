<?php

namespace App\Models;

use App\Enums\EmploymentType;
use App\Enums\EmploymentLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_experience';
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'employment_type' => EmploymentType::class,
            'location' => EmploymentLocation::class,
        ];
    }

}
