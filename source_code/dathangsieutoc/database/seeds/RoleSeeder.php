<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=== Role cao nhất => dành cho đội phát triển ===*/
        $role = new Role();
        $role->slug = 'developer';
        $role->name = 'Kỹ thuật hệ thống';
        $role->locale = env('LOCALE_DEFAULT');
        $role->save();
        $role->permissions()->attach(Permission::where([['slug', 'list-user'], ['locale', $role->locale]])->first());
        $role->permissions()->attach(Permission::where([['slug', 'list-news'], ['locale', $role->locale]])->first());

        $role = new Role();
        $role->slug = 'developer';
        $role->name = 'System Developer';
        $role->locale = 'en';
        $role->locale_source_id = Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $role->save();
        $role->permissions()->attach(Permission::where([['slug', 'list-user'], ['locale', $role->locale]])->first());
        $role->permissions()->attach(Permission::where([['slug', 'list-news'], ['locale', $role->locale]])->first());
    }
}
