<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstInchargMd extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incharg_name', 'incharg_dept', 'incharg_status', 'created_by', 'updated_by'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}