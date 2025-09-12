<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'uses',
    ];

    protected $casts = [
        "uses" => 'integer',
        "max_uses" => 'integer',
        "discount" => 'double',
        "is_fixed" => 'boolean',
        "budget" => 'double',
        "start_at" => 'datetime',
        "expire_at" => 'datetime',
    ];

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public static function scopeByCode(Builder $builder, string $code): void
    {
        $builder->where('code', $code);
    }

    public function scopeSearch(Builder $builder, $search): void
    {
        $builder->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function discount(float $amount)
    {
        if ($this->is_fixed)
            return $this->discount;

        return ($this->discount / 100) * $amount;
    }

    public function isValid(float $amount)
    {

        if ($this->isExpired()) {
            return false;
        }

        if ($this->isOverMaxUses()) {
            return false;
        }

        if ($this->isOverBudget()) {
            return false;
        }

        if (!$this->isValidAmount($amount)) {
            return false;
        }

        return true;

    }

    /**
     * Check if code is expired.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        $expire_at = $this->expire_at;

        return !is_null($this->attributes['expire_at']) && now()->gte($expire_at);
    }

    /**
     * Check if coupon is disposable.
     *
     * @return bool
     */
    public function isDisposable(): bool
    {
        return !is_null($this->max_uses);
    }

    /**
     * Check if the coupon over max uses.
     *
     *
     * @return bool
     */
    public function isOverMaxUses(): bool
    {
        return $this->isDisposable() && $this->uses >= $this->max_uses;
    }

    /**
     * Check if code amount is over.
     *
     * @return bool
     */
    public function isOverBudget(): bool
    {
        $budget = $this->budget;

        return !is_null($budget) && $budget <= 0;
    }

    public function isValidAmount(float $amount): bool
    {

        if (!is_null($this->budget) && $this->budget <= $amount) {
            return false;
        }

        if ($this->discount($amount) > $amount) {
            return false;
        }

        return true;

    }

    public function scopeValid(Builder $builder): void
    {
        $builder->where(function ($query) {
            $query
                ->where(function ($q) {
                    $q->whereNull('expire_at') // No expiration
                        ->orWhere('expire_at', '>', now()); // Not expired
                })
                ->where(function ($q) {
                    $q->whereNull('max_uses') // No max uses
                        ->orWhereColumn('uses', '<', 'max_uses'); // Below max uses
                })
                ->where(function ($q) {
                    $q->whereNull('budget') // No budget
                        ->orWhere('budget', '>', 0); // Budget is greater than zero
                })
            ;
        });
    }


}
