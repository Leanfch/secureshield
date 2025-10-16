<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Plan Model
 *
 * Represents antivirus subscription plans
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property int $devices_limit
 * @property bool $real_time_protection
 * @property bool $cloud_backup
 * @property bool $vpn_included
 * @property bool $priority_support
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'devices_limit',
        'real_time_protection',
        'cloud_backup',
        'vpn_included',
        'priority_support',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'real_time_protection' => 'boolean',
            'cloud_backup' => 'boolean',
            'vpn_included' => 'boolean',
            'priority_support' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the subscriptions for the plan.
     *
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
