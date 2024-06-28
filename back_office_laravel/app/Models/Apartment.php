<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\User;
//use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'price', 'rooms_number', 'beds_number', 'baths_number', 'mtq', 'address', 'latitude', 'longitude', 'image', 'visible'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class)->withPivot('start_date', 'expiration_date');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

}
