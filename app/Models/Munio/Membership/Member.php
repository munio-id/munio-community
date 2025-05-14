<?php

namespace App\Models\Munio\Membership;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

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
}