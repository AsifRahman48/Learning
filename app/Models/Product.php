<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public const GENDER_CHECKBOX = [
        '1' => 'Male',
        '0' => 'Female',
    ];

    public $table='products';

    protected $fillable=[
        'name',
        'tag_id',
        'category_id',
        'price',
        'status',
        'gender',
        'hobby'
        
    ];

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
