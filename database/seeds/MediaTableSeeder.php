<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            'about_text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus interdum neque nec volutpat. Donec
                        in tempus diam, eu condimentum mauris. Aenean feugiat metus at nisi egestas, vitae ullamcorper tortor
                        ultrices. Phasellus eros nisl, elementum vel eros mattis, dapibus congue magna. Praesent sed tristique
                        tellus, id faucibus neque. Etiam feugiat erat tellus, ac rhoncus erat pellentesque et. Nullam ligula
                        odio, molestie ac tincidunt at, maximus at est. Curabitur dui urna, consectetur id accumsan ac,
                        dignissim vel sem. Nullam bibendum, mi ac laoreet tempus, ligula ex facilisis ligula, sit amet efficitur
                        lectus nisl nec orci. Aliquam sed orci a ipsum ultrices sollicitudin. Nulla iaculis ipsum libero, eget
                        consequat arcu accumsan tincidunt. Integer maximus vel neque vitae convallis. Mauris a erat a justo
                        feugiat auctor.',
            'about_image'=>'https://f4.bcbits.com/img/a4104822284_10.jpg',
            'video_one'=>'https://www.youtube.com/embed/kuaVIwe28Jk',
            'video_two'=>'https://www.youtube.com/embed/43lsrH8VA2k',
            'photo_one'=>'https://scontent.fbud3-1.fna.fbcdn.net/v/t1.0-9/69719872_440386166560778_2031298086789185536_n.jpg?_nc_cat=103&_nc_sid=e007fa&_nc_ohc=JPIZ1nSRV9YAX9c2Bdj&_nc_ht=scontent.fbud3-1.fna&oh=9088f2ac398703af93248ca5a1b3b1ef&oe=5F026199',
            'photo_two'=>'https://scontent.fbud3-1.fna.fbcdn.net/v/t1.0-9/70152065_445782349354493_6019709862949158912_o.jpg?_nc_cat=108&_nc_sid=0be424&_nc_ohc=AvzR9PiQL0UAX82asWG&_nc_ht=scontent.fbud3-1.fna&oh=89603e8f176d67879f4b5059907673d0&oe=5F037DD3',
            'photo_three'=>'https://scontent.fbud3-1.fna.fbcdn.net/v/t1.0-9/49472269_327425934523469_1624241762446868480_o.jpg?_nc_cat=101&_nc_sid=e007fa&_nc_ohc=0jpiWsdVjEQAX8_ZBPl&_nc_ht=scontent.fbud3-1.fna&oh=375b8952e58a8e688e9bf693b8e42514&oe=5F00A0B7',
        ]);
    }
}
