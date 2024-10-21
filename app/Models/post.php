<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function Tags()
    {
        return $this->belongsToMany(tag::class);
    }

    protected function Thumbnails(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/' . $this->thumbnail),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
