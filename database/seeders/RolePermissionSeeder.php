<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        $roleSuperAdmin = Role::create([
            'name' => 'superadmin',
            'guard_name' => 'web',
        ]);

        $permissions = [
            'admin.home',

            'admin.category.index',
            'admin.category.create',
            'admin.category.store',
            'admin.category.show',
            'admin.category.edit',
            'admin.category.update',
            'admin.category.destroy',


            'admin.subCategory.store',
            'admin.subCategory.edit',
            'admin.subCategory.update',
            'admin.subCategory.destroy',

            'admin.news.index',
            'admin.news.create',
            'admin.news.store',
            'admin.news.show',
            'admin.news.edit',
            'admin.news.update',
            'admin.news.destroy',

            'admin.motamot',
            'admin.motamot.create',
            'admin.motamot.edit',
            'admin.motamot.destroy',

            'admin.sofolPerson',
            'admin.sofolPerson.create',
            'admin.sofolPerson.edit',
            'admin.sofolPerson.destroy',

            'admin.khashKhobor',
            'admin.khashKhobor.create',
            'admin.khashKhobor.edit',
            'admin.khashKhobor.destroy',


            'admin.advertisement.index',
            'admin.advertisement.create',
            'admin.advertisement.store',
            'admin.advertisement.show',
            'admin.advertisement.edit',
            'admin.advertisement.update',
            'admin.advertisement.destroy',

            'admin.prayer.index',
            'admin.prayer.create',
            'admin.prayer.store',
            'admin.prayer.show',
            'admin.prayer.edit',
            'admin.prayer.update',
            'admin.prayer.destroy',

            'admin.multimedia.index',
            'admin.multimedia.create',
            'admin.multimedia.store',
            'admin.multimedia.show',
            'admin.multimedia.edit',
            'admin.multimedia.update',
            'admin.multimedia.destroy',
            
            'admin.user.index',
            'admin.user.create',
            'admin.user.store',
            'admin.user.show',
            'admin.user.edit',
            'admin.user.update',
            'admin.user.destroy',
            
            'admin.role.index',
            'admin.role.create',
            'admin.role.store',
            'admin.role.show',
            'admin.role.edit',
            'admin.role.update',
            'admin.role.destroy',


        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permission = Permission::create([
                'name' => $permissions[$i],
                'guard_name' => 'web',
            ]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }


        foreach ($users as $key => $user) {
            $user->roles()->detach();
            $user->assignRole($roleSuperAdmin);
        }
    }
}
