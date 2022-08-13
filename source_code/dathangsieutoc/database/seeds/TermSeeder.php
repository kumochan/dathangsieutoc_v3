<?php

use Illuminate\Database\Seeder;
use App\Base\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $term = new Term();
        $term->name = 'Danh mục quản trị';
        $term->slug = 'backend-menu';
        $term->type = 'backend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->save();

        /*=== Danh mục Frontend ===*/
        $term = new Term();
        $term->name = 'Danh mục Frontend';
        $term->slug = 'frontend-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->save();
    }
}
