<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends \Baum\Node
{

    protected $table = "directions";


    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }
}
