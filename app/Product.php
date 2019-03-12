<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $filable=['price', 'descripation', 'title', 'Imgpath'];
}
