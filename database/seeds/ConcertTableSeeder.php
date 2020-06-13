<?php

use Illuminate\Database\Seeder;

class ConcertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concerts')->insert([
            'user_id'=>1,
            'date'=>'2020.01.01',
            'venue'=>'Budapest - Barba Negra Track',
            'open'=>'18:00',
            'start'=>'20:25',
            'price_advance'=>'2999',
            'price_onsite'=>'3499',
            'more_info'=>'https://www.facebook.com/Fetish-section-216667235599340/',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('concerts')->insert([
            'user_id'=>1,
            'date'=>'2020.05.07',
            'venue'=>'Egervár - Egervári Várkastély',
            'open'=>'18:30',
            'start'=>'22:15',
            'price_advance'=>'3500',
            'price_onsite'=>'4000',
            'more_info'=>'https://www.facebook.com/Fetish-section-216667235599340/',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('concerts')->insert([
            'user_id'=>1,
            'date'=>'2020.07.17',
            'venue'=>'Békéscsaba - Csabagyöngye Kulturális Központ',
            'open'=>'20:00',
            'start'=>'21:50',
            'price_advance'=>'2999',
            'price_onsite'=>'3499',
            'more_info'=>'https://www.facebook.com/Fetish-section-216667235599340/',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
