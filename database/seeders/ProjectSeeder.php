<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'wiphub',
                'cover_image' => 'wiphub',
                'description' => 'art website, hybrid of many popular one',
                'content' => <<<MD
## about this project

wiphub originally to be my first real and big project, but nah that's too much

> 67
MD,
                'url'         => 'https://github.com/levtofer/wiphub',
                'tags'        => ['Personal', 'Laravel'],
                'tech_stack'  => ['Laravel', 'Blade', 'Tailwind'],
                'status'      => 'published',
                'featured'    => true,
                'order'       => 1,
            ],
            // [
            //     'title'       => 'unfinished archive',
            //     'cover_image' => 'unfinished_archive',
            //     'description' => 'collecting ideas that never shipped',
            //     'content' => 'your long explanation here...',
            //     'tags'        => ['UI/UX', 'Experimental'],
            //     'tech_stack'  => ['Figma'],
            //     'status'      => 'published',
            //     'featured'    => true,
            //     'order'       => 2,
            // ],
            // [
            //     'title'       => 'memory fragments',
            //     'cover_image' => 'memory_fragments',
            //     'description' => 'a visual diary of sorts',
            //     'content' => 'your long explanation here...',
            //     'tags'        => ['Illustration', 'Personal'],
            //     'tech_stack'  => ['Photoshop'],
            //     'status'      => 'published',
            //     'featured'    => false,
            //     'order'       => 3,
            // ],

            // [
            //     'title'       => 'daily ui collection',
            //     'description' => 'a collection of daily ui challenges',
            //     'tags'        => ['UI/UX', 'Design'],
            //     'tech_stack'  => ['Figma'],
            //     'status'      => 'published',
            //     'featured'    => true,
            //     'order'       => 4,
            // ],
            // [
            //     'title'       => 'laravel starter',
            //     'description' => 'a minimal laravel starter template',
            //     'tags'        => ['Laravel', 'Personal'],
            //     'tech_stack'  => ['Laravel', 'Tailwind'],
            //     'status'      => 'published',
            //     'featured'    => false,
            //     'order'       => 5,
            // ],
            // [
            //     'title'       => 'type experiments',
            //     'description' => 'playing with typography and layouts',
            //     'tags'        => ['Design', 'Experimental'],
            //     'tech_stack'  => ['HTML', 'CSS'],
            //     'status'      => 'published',
            //     'featured'    => false,
            //     'order'       => 6,
            // ],
            // [
            //     'title'       => 'night notes',
            //     'description' => 'a late night journaling app concept',
            //     'tags'        => ['UI/UX', 'Personal'],
            //     'tech_stack'  => ['Figma', 'React'],
            //     'status'      => 'published',
            //     'featured'    => false,
            //     'order'       => 7,
            // ],
            // [
            //     'title'       => 'pixel garden',
            //     'description' => 'tiny pixel art experiments',
            //     'tags'        => ['Art', 'Personal'],
            //     'tech_stack'  => ['Aseprite'],
            //     'status'      => 'published',
            //     'featured'    => false,
            //     'order'       => 8,
            // ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($project['title'])],
                $project
            );
        }
    }
}
