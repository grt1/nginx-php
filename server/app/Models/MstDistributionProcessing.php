<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstDistributionProcessing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'process_div', 'code', 'distribution_item', 'dist_status', 'created_by', 'updated_by'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}