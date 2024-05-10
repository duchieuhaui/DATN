<?php

namespace Themes\Mytravel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Hotel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bravo_hotels')->update(['badge_tags' => '[{"title":"Free breakfast","color":"green"},{"title":"Service VIP","color":"danger"}]']);
    }
}
