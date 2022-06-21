<?php

namespace Yepos\Albums\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;


    protected $table = 'albums';

    protected $guarded = [];
    public $timestamps = false;


}
