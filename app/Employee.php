<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    public function company(): belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
