<?php

use Illuminate\Database\Seeder;
use App\Base\Thing;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $thing = new Thing();
            $thing->title = 'What we can do for you';
            $thing->excerpt = 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.';
            $thing->content = 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.

No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.


The display is most important
I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.

because it is pleasure, but because those who do not know how to pursue pleasure

“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”
I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.';
            $thing->slug = '/what-we-can-do-for-you';
            $thing->featured_img = '/upload/3.jpg';
            $thing->type = 'news';
            $thing->status = 'publish';
            $thing->locale = env('LOCALE_DEFAULT');
            $thing->locale_source_id = 0;
            $thing->author = 1;
            $thing->order_index = 0;
            $thing->metadata = '{"tags":[""],"hot":"0"}';
            $thing->save();
        }
    }
}
