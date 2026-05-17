<?php

namespace Database\Seeders;

use App\Models\Guestbook;
use Illuminate\Database\Seeder;

class GuestbookSeeder extends Seeder
{
    public function run(): void
    {
        Guestbook::create([
            'name'       => 'Levtofer',
            'message'    => 'hello everyone',
            'created_at' => now()->subDays(3),
        ]);
        Guestbook::create([
            'name'       => 'Levtofer',
            'message'    => 'levtofer here, what\'s up?',
            'created_at' => now()->subDays(1),
        ]);
        Guestbook::create([
            'name'       => 'Levtofer',
            'message'    => 'it\'s really a beautiful day here, isn\'t it?',
            'created_at' => now(),
        ]);
    }
}
