<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function employees(): hasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogo()
    {
        if($this->logo !== null && file_exists(public_path('storage/'.$this->logo))){
            return $this->logo;
        } else {
            return '';
        }
    }
}
