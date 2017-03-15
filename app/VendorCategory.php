<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    //
    public function parentId(){
        return $this->belongsTo(VendorCategory::class);
    }
}
