<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abc extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'github', 'twitter', 'location', 'latest_article_published'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}