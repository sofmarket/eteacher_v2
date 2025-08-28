<?php

namespace App\Models;

use App\Models\Scopes\PositionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSubjectGroup extends Model {
    use HasFactory;

    protected static function booted() {
        static::addGlobalScope(new PositionScope);
    }

    public $timestamps = false;

    public $fillable = [
        'user_id',
        'subject_group_id',
        'sort_order'
    ];

    protected $with = [
        'group', 
        'subjects'
    ];

    public function group(): BelongsTo {
        return $this->belongsTo(SubjectGroup::class, 'subject_group_id', 'id');
    }

    public function subjects(): HasMany {
        return $this->hasMany(UserSubjectGroupSubject::class, 'user_subject_group_id');
    }
}
