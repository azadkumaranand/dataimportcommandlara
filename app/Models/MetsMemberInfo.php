<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetsMemberInfo extends Model
{
    protected $fillable = [
        'member_id', 'cpnum', 'membership_year', 'paid_date',
        'membership_type', 'assoccode'
    ];

    protected $casts = [
        'membership_year' => 'integer',
        'paid_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(MetsMember::class, 'member_id');
    }
}
