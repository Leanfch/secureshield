<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Payment Model
 *
 * Represents payment transactions via MercadoPago
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscription_id
 * @property float $amount
 * @property string $currency
 * @property string|null $payment_method
 * @property string|null $mp_payment_id
 * @property string|null $mp_preference_id
 * @property string $status
 * @property string|null $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'subscription_id',
        'amount',
        'currency',
        'payment_method',
        'mp_payment_id',
        'mp_preference_id',
        'status',
        'description',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    /**
     * Get the user that owns the payment.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subscription that owns the payment.
     *
     * @return BelongsTo
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Check if payment is approved.
     *
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }
}
