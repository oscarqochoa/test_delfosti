<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;
    protected $table = "articles";

    protected $fillable = [
        'name',
        'description',
        'status'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_article', 'fk_article', 'fk_category');
    }

    protected function name(): Attribute
    {
        return new Attribute(
            set: fn($value) => preg_replace('([^A-Za-z0-9])', '', $value)
            );
    }

    protected function status(): Attribute
    {
        return new Attribute(
            set: fn() => true
            );
    }

}
