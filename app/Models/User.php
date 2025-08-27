<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $appends = [
        'name',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute()
    {
        return $this->profile?->first_name . ' ' . $this->profile?->last_name;
    }

    public function scopeFindByUsername($query, $username)
    {
        return $query->where('email', $username); // TODO: add phone
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function accountSetting(): HasMany
    {
        return $this->hasMany(AccountSetting::class, 'user_id');
    }

    public function identityVerification(): HasOne
    {
        return $this->hasOne(UserIdentityVerification::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(UserSubjectGroup::class)->orderBy('sort_order');
    }

    public function subjects(): HasManyThrough
    {
        return $this->hasManyThrough(UserSubjectGroupSubject::class, UserSubjectGroup::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Rating::class, 'tutor_id');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function socialProfiles(): HasMany
    {
        return $this->hasMany(SocialProfile::class);
    }

    public function redirectAfterLogin(): Attribute
    {
        return Attribute::make(
            get: fn() => match ('tutor') {
                'admin'     => route('admin.insights', absolute: false),
                'tutor'     => route('tutor.dashboard', absolute: false),
                'student'   => route('student.bookings', absolute: false),
                default     => url('/')
            },
        );
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class);
    }

    /**
     * Get the experiences for the user.
     */
    public function experiences()
    {
        return $this->hasMany(UserExperience::class);
    }

    /**
     * Get the certificates for the user.
     */
    public function certificates()
    {
        return $this->hasMany(UserCertificate::class);
    }

    /**
     * Get the identity verifications for the user.
     */
    public function identityVerifications()
    {
        return $this->hasMany(UserIdentityVerification::class);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'user_languages');
    }

}
