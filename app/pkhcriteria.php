<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pkhcriteria extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
       'name', 'bantuan',
    ];
}
