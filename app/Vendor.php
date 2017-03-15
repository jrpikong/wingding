<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function userId(){
        return $this->belongsTo(User::class);
    }

    public function vendorCategoryId(){
        return $this->belongsTo(VendorCategory::class);
    }
}

