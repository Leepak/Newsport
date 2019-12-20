<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getBodyAttribute($body)
    {
         return strip_tags($body);
    }
}
