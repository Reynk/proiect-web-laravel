<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'date', 'about', 'description', 'price', 'image'];
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
