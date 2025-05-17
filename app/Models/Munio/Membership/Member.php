<?php

namespace App\Models\Munio\Membership;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use Multitenantable;

    protected $table = 'membership_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'organization_id',
        'number',
        'name',
        'email',
        'phone',
        'address',
        'status',
        'status_updated_at'
    ];

    /**
     * Boot
     */
    protected static function boot()
    {
        parent::boot();

        static::updating(function (self $model) {
            if ($model->isDirty('status')) {
                $model->status_updated_at = now();
            }
        });
    }
    /**
     * Relationships
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, table: 'membership_member_attribute')
            ->withPivot('value');
    }
}
