<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $table='tags';

    protected $fillable=[
        'name',
    ];

    public function product(){
        return $this->hasOne(Product::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }

}
