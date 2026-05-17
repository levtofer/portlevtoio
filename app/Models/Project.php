<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'cover_image',
        'tags',
        'tech_stack',
        'screenshots',
        'status',
        'featured',
        'order',
    ];

    protected $casts = [
        'tags'        => 'array',
        'tech_stack'  => 'array',
        'screenshots' => 'array',
        'featured'    => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($p) => $p->slug = Str::slug($p->title));
    }

    public function getCoverUrlAttribute(): string
    {
        foreach (['png', 'jpg', 'jpeg', 'webp'] as $ext) {
            if (file_exists(public_path('images/works/' . $this->cover_image . '.' . $ext))) {
                return asset('images/works/' . $this->cover_image . '.' . $ext);
            }
        }
        return 'https://placehold.co/400x160/faf7f2/8c7d6e?text=cover';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getRenderedContentAttribute(): string
    {
        if (!$this->content) return '';
        $converter = new CommonMarkConverter([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);
        return $converter->convert($this->content)->getContent();
    }
}
