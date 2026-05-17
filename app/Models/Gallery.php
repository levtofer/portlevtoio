<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['title', 'note', 'image', 'order'];

    public function getImageUrlAttribute(): string
    {
        foreach (['png', 'jpg', 'jpeg', 'webp', 'jfif'] as $ext) {

            $path = public_path('images/gallery/' . $this->image . '.' . $ext);

            if (file_exists($path)) {
                return asset('images/gallery/' . $this->image . '.' . $ext);
            }
        }

        return 'https://placehold.co/400x500/ece4d6/8c7d6e?text=sketch';
    }
}
