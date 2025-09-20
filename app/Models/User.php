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

    public function scopeBySessionType($query)
    {
        $query->when(request()->has('session_type'), function ($query) {
            $query->whereHas('subjects.slots', function ($slot) {
                if (request()->session_type == 'private') {
                    $slot->where('spaces', '=', 1);
                } else {
                    $slot->where('spaces', '>', 1);
                }
            });
        });
    }

    public function scopeByRating($query)
    {
        $query->when(request()->has('rating'), function ($query) {
            $query->whereHas('reviews', function ($query) {
                $query->select('user_id');
                $query->groupBy('user_id');
                $query->havingRaw('avg(rating) >= ?', (array) request()->rating);
            });
        });
    }

    public function scopeMaxPrice($query)
    {
        $query->when(request()->has('max_price'), function ($query) {
            $query->whereHas('subjects', function ($query) {
                $query->where('hour_rate', '<=', request()->max_price);
            });
        });
    }

    public function scopeBySubject($query)
    {
        $query->when(request()->has('subject_id'), function ($query) {
            $query->whereHas('subjects', function ($query) {
                $query->where('subject_id', request()->subject_id);
            });
        });
    }

    public function scopeByCity($query)
    {
        $query->when(request()->has('city'), function ($query) {
            $query->whereHas('address', function ($address) {
                $address->where('city', 'like', '%' . request()->city . '%');
            });
        });
    }

    public function scopeBySubjectGroup($query)
    {
        $query->when(request()->has('group_id'), function ($query) {
            $query->whereHas('subjectGroups', function ($query) {
                $query->where('subject_group_id', request()->group_id);
            });
        });
    }

    public function scopeByKeyword($query)
    {
        $query->when(request()->has('keyword'), function ($query) {
            $query->where(function ($query) {

                $keyword = '%' . request()->keyword . '%';

                $query->whereHas('profile', function ($query) use ($keyword) {
                    $query->where('first_name', 'like', $keyword)
                        ->orWhere('last_name', 'like', $keyword);
                });

                // todo: tobe tested and uncommented
                // $query->orWhereHas('subjects.subject', function ($query) use ($keyword) {
                //     $query->where('name', 'like', $keyword);
                // });

                // $query->orWhereHas('groups.group', function ($query) use ($keyword) {
                //     $query->where('name', 'like', $keyword);
                // });

            });
        });
    }

    public function scopeSortBy($query)
    {
        $query->when(request()->has('sort_by'), function ($query) {
            switch (request()->sort_by) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'asc':
                    $query->join('profiles', 'profiles.user_id', '=', 'users.id')->orderBy('first_name', 'asc');
                    break;
                case 'desc':
                    $query->join('profiles', 'profiles.user_id', '=', 'users.id')->orderBy('first_name', 'desc');
                    break;
            }
        }, function ($query) {
            $query->orderBy('avg_rating', 'desc');
            $query->orderBy('created_at', 'desc');
        });
    }

    public function scopeWithStats($query)
    {
        $query->withMin('subjects as min_price', 'hour_rate')
            ->withAvg('reviews as avg_rating', 'rating')
            ->withCount('reviews as total_reviews')
            ->withCount([
                'bookingSlots as active_students' => function ($query) {
                    $query->whereStatus('active');
                }
            ]);
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
                'admin' => route('admin.home', absolute: false),
                'tutor' => route('tutor.home', absolute: false),
                'student' => route('student.home', absolute: false),
                default => url('/')
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
