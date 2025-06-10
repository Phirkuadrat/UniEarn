<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioImages extends Model
{
    protected $fillable = [
        'portofolio_id',
        'image_path'
    ];

    public function portfolio(){
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }

    public function getImagePathAttribute(){
        return $this->attributes['image_path'];
    }
    
    public function setImagePathAttribute($value){
        $this->attributes['image_path'] = $value;
    }
}
