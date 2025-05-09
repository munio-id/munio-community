<?php

namespace App\Models\Munio\Organization;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'domain'
    ];
}
