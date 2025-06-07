<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioImages extends Model
{
    protected $fillable = [
        'portfolio_id',
        'image_path'
    ];

    public function portfolio(){
        return $this->belongsTo(Portofolio::class, 'portfolio_id');
    }

    public function getImagePathAttribute(){
        return $this->image_path;
    }
    
    public function setImagePathAttribute($value){
        $this->attributes['image_path'] = $value;
    }
}
