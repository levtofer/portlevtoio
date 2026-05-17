<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'cuptoast',    'note' => 'old pfp, and i love cuptoast',          'image' => 'cuptoast', 'order' => 1],
            ['title' => 'cuptoast banner',          'note' => 'designing my first banner for a placeholder',   'image' => 'cuptoast-banner', 'order' => 2],
            ['title' => '3m',           'note' => '',    'image' => '3m', 'order' => 3],
            ['title' => 'mana bandung',        'note' => 'bandung lain braga jeung dago hungkul',                'image' => 'mana-jawa-barat', 'order' => 4],
            ['title' => 'waifi ngeleg',   'note' => '', 'image' => 'waifi-ngeleg', 'order' => 5],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
