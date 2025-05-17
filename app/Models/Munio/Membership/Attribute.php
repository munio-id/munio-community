<?php

namespace App\Models\Munio\Membership;

use App\Enums\MemberAttributeTypeEnum;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Multitenantable;

    protected $table = 'membership_attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'organization_id',
        'fieldname',
        'label',
        'type',
        'options',
        'notes',
        'is_private',
        'is_required'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => MemberAttributeTypeEnum::class,
            'options' => 'json',
            'is_private' => 'boolean',
            'is_required' => 'boolean',
        ];
    }
}
