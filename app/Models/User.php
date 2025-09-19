<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Bavix\Wallet\Interfaces\Wallet;
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
use Bavix\Wallet\Traits\HasWallet;



class User extends Authenticatable implements Wallet
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasWallet;

    protected $with = [
        'profile',
    ];

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


    /*===============================================
        RELATIONS
    ===============================================*/

    /**
     * Get the profile for the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the account settings for the user.
     */
    public function accountSetting(): HasMany
    {
        return $this->hasMany(AccountSetting::class, 'user_id');
    }

    /**
     * Get the identity verification for the user.
     */
    public function identityVerification(): HasOne
    {
        return $this->hasOne(UserIdentityVerification::class);
    }

    /**
     * Get the subject groups for the user.
     */
    public function subjectGroups(): HasMany
    {
        return $this->hasMany(UserSubjectGroup::class)->orderBy('sort_order');
    }

    public function subjects(): HasManyThrough
    {
        return $this->hasManyThrough(UserSubjectGroupSubject::class, UserSubjectGroup::class);
    }

    /**
     * Get the reviews for the user.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Rating::class, 'tutor_id');
    }

    /**
     * Get the address for the user.
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the social profiles for the user.
     */
    public function socialProfiles(): HasMany
    {
        return $this->hasMany(SocialProfile::class);
    }

    /**
     * Get the subject slots for the user.
     */
    public function subjectSlots()
    {
        return $this->hasMany(UserSubjectSlot::class, 'tutor_id', 'id');
    }

    /**
     * Get the booking slots for the user.
     */
    public function bookingSlots(): HasMany
    {
        return $this->hasMany(SlotBooking::class, 'tutor_id');
    }

    /**
     * Get the educations for the user.
     */
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

    /**
     * Get the languages for the user.
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'user_languages');
    }


    /*===============================================
        SCOPES
    ===============================================*/
    
    /**
     * Scope a query to find a user by username.
     */
    public function scopeFindByUsername($query, $username)
    {
        return $query->where(function ($query) use ($username) {
            $query->where('email', $username);
            $query->orWhere('phone', $username);
        });
    }

    /**
     * Scope a query to only include tutors.
     */
    public function scopeTutor($query)
    {
        return $this->where('type', 'tutor');
    }

    /**
     * Scope a query to only include students.
     */
    public function scopeStudent($query)
    {
        return $this->where('type', 'student');
    }

    /*===============================================
        ATTRIBUTES
    ===============================================*/

    /**
     * Get the redirect after login for the user.
     */
    public function redirectAfterLogin(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->attributes['type']) {
                'admin'     => route('admin.home', absolute: false),
                'tutor'     => route('tutor.home', absolute: false),
                'student'   => route('student.home', absolute: false),
                default     => url('/')
            },
        );
    }

    /**
     * Get the name of the user.
     */
    public function getNameAttribute()
    {
        return $this->profile?->first_name . ' ' . $this->profile?->last_name;
    }

}
