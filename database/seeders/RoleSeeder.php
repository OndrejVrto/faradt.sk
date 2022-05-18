<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void {
            // id 1
        $roleMaster = Role::create(['name' => 'Super Administrátor']);
        $roleMaster->givePermissionTo(Permission::all());

        $nameRoles = [
            // id 2
            'Administrátor' => [
                'admin.dashboard',

                'impersonate',

                'banners.create',
                'banners.destroy',
                'banners.edit',
                'banners.index',
                'banners.show',
                'banners.store',
                'banners.update',

                'categories.create',
                'categories.destroy',
                'categories.edit',
                'categories.index',
                'categories.store',
                'categories.update',

                'charts.data.create',
                'charts.data.destroy',
                'charts.data.edit',
                'charts.data.index',
                'charts.data.store',
                'charts.data.update',

                'charts.create',
                'charts.destroy',
                'charts.edit',
                'charts.index',
                'charts.show',
                'charts.store',
                'charts.update',

                'day-ideas.create',
                'day-ideas.destroy',
                'day-ideas.edit',
                'day-ideas.index',
                'day-ideas.store',
                'day-ideas.update',

                'faqs.create',
                'faqs.destroy',
                'faqs.edit',
                'faqs.index',
                'faqs.store',
                'faqs.update',

                'files.create',
                'files.destroy',
                'files.edit',
                'files.index',
                'files.store',
                'files.update',

                'galleries.create',
                'galleries.destroy',
                'galleries.edit',
                'galleries.index',
                'galleries.show',
                'galleries.store',
                'galleries.update',

                'news.create',
                'news.destroy',
                'news.edit',
                'news.index',
                'news.store',
                'news.update',

                'notice-acolyte.create',
                'notice-acolyte.destroy',
                'notice-acolyte.edit',
                'notice-acolyte.index',
                'notice-acolyte.store',
                'notice-acolyte.update',

                'notice-church.create',
                'notice-church.destroy',
                'notice-church.edit',
                'notice-church.index',
                'notice-church.store',
                'notice-church.update',

                'notice-lecturer.create',
                'notice-lecturer.destroy',
                'notice-lecturer.edit',
                'notice-lecturer.index',
                'notice-lecturer.store',
                'notice-lecturer.update',

                'pictures.create',
                'pictures.destroy',
                'pictures.edit',
                'pictures.index',
                'pictures.show',
                'pictures.store',
                'pictures.update',

                'prayers.create',
                'prayers.destroy',
                'prayers.edit',
                'prayers.index',
                'prayers.store',
                'prayers.update',

                'priests.create',
                'priests.destroy',
                'priests.edit',
                'priests.index',
                'priests.store',
                'priests.update',

                'sliders.create',
                'sliders.destroy',
                'sliders.edit',
                'sliders.index',
                'sliders.store',
                'sliders.update',

                'static-pages.create',
                'static-pages.destroy',
                'static-pages.edit',
                'static-pages.index',
                'static-pages.store',
                'static-pages.update',

                'tags.create',
                'tags.destroy',
                'tags.edit',
                'tags.index',
                'tags.store',
                'tags.update',

                'testimonials.create',
                'testimonials.destroy',
                'testimonials.edit',
                'testimonials.index',
                'testimonials.store',
                'testimonials.update',

                'unisharp.lfm.',
                'unisharp.lfm.domove',
                'unisharp.lfm.getAddfolder',
                'unisharp.lfm.getCrop',
                'unisharp.lfm.getCropimage',
                'unisharp.lfm.getCropnewimage',
                'unisharp.lfm.getDelete',
                'unisharp.lfm.getDownload',
                'unisharp.lfm.getErrors',
                'unisharp.lfm.getFolders',
                'unisharp.lfm.getItems',
                'unisharp.lfm.getRename',
                'unisharp.lfm.getResize',
                'unisharp.lfm.move',
                'unisharp.lfm.performResize',
                'unisharp.lfm.show',
                'unisharp.lfm.upload',

                'users.create',
                'users.destroy',
                'users.edit',
                'users.index',
                'users.show',
                'users.store',
                'users.update',
            ],
            // id 3
            'Moderátor' => [
                'admin.dashboard',

                'impersonate',

                'categories.create',
                'categories.destroy',
                'categories.edit',
                'categories.index',
                'categories.store',
                'categories.update',

                'charts.data.create',
                'charts.data.destroy',
                'charts.data.edit',
                'charts.data.index',
                'charts.data.store',
                'charts.data.update',

                'charts.create',
                'charts.destroy',
                'charts.edit',
                'charts.index',
                'charts.show',
                'charts.store',
                'charts.update',

                'faqs.create',
                'faqs.destroy',
                'faqs.edit',
                'faqs.index',
                'faqs.store',
                'faqs.update',

                'news.create',
                'news.destroy',
                'news.edit',
                'news.index',
                'news.store',
                'news.update',

                'notice-acolyte.create',
                'notice-acolyte.destroy',
                'notice-acolyte.edit',
                'notice-acolyte.index',
                'notice-acolyte.store',
                'notice-acolyte.update',

                'notice-church.create',
                'notice-church.destroy',
                'notice-church.edit',
                'notice-church.index',
                'notice-church.store',
                'notice-church.update',

                'notice-lecturer.create',
                'notice-lecturer.destroy',
                'notice-lecturer.edit',
                'notice-lecturer.index',
                'notice-lecturer.store',
                'notice-lecturer.update',

                'prayers.create',
                'prayers.destroy',
                'prayers.edit',
                'prayers.index',
                'prayers.store',
                'prayers.update',

                'priests.create',
                'priests.destroy',
                'priests.edit',
                'priests.index',
                'priests.store',
                'priests.update',

                'sliders.create',
                'sliders.destroy',
                'sliders.edit',
                'sliders.index',
                'sliders.store',
                'sliders.update',

                'tags.create',
                'tags.destroy',
                'tags.edit',
                'tags.index',
                'tags.store',
                'tags.update',

                'testimonials.create',
                'testimonials.destroy',
                'testimonials.edit',
                'testimonials.index',
                'testimonials.store',
                'testimonials.update',

                'unisharp.lfm.',
                'unisharp.lfm.domove',
                'unisharp.lfm.getAddfolder',
                'unisharp.lfm.getCrop',
                'unisharp.lfm.getCropimage',
                'unisharp.lfm.getCropnewimage',
                'unisharp.lfm.getDelete',
                'unisharp.lfm.getDownload',
                'unisharp.lfm.getErrors',
                'unisharp.lfm.getFolders',
                'unisharp.lfm.getItems',
                'unisharp.lfm.getRename',
                'unisharp.lfm.getResize',
                'unisharp.lfm.move',
                'unisharp.lfm.performResize',
                'unisharp.lfm.show',
                'unisharp.lfm.upload',

                'users.index',
                'users.show',
            ],
            // id 4
            'Redaktor' => [
                'admin.dashboard',

                'news.create',
                'news.destroy',
                'news.edit',
                'news.index',
                'news.store',
                'news.update',

                'unisharp.lfm.',
                'unisharp.lfm.domove',
                'unisharp.lfm.getAddfolder',
                'unisharp.lfm.getCrop',
                'unisharp.lfm.getCropimage',
                'unisharp.lfm.getCropnewimage',
                'unisharp.lfm.getDelete',
                'unisharp.lfm.getDownload',
                'unisharp.lfm.getErrors',
                'unisharp.lfm.getFolders',
                'unisharp.lfm.getItems',
                'unisharp.lfm.getRename',
                'unisharp.lfm.getResize',
                'unisharp.lfm.move',
                'unisharp.lfm.performResize',
                'unisharp.lfm.show',
                'unisharp.lfm.upload',
            ],
            // id 5
            'Kontrolór' => [
                'admin.dashboard',
                'categories.index',
                'charts.data.index',
                'charts.index',
                'charts.show',
                'faqs.index',
                'news.index',
                'notice-acolyte.index',
                'notice-church.index',
                'notice-lecturer.index',
                'prayers.index',
                'priests.index',
                'sliders.index',
                'tags.index',
                'testimonials.index',
                'users.index',
                'users.show',
            ],
            // id 6
            'Farské oznamy' => [
                'admin.dashboard',
                'notice-church.create',
                'notice-church.destroy',
                'notice-church.edit',
                'notice-church.index',
                'notice-church.store',
                'notice-church.update',
            ],
            // id 7
            'Akolyta' => [
                'admin.dashboard',
                'notice-acolyte.create',
                'notice-acolyte.destroy',
                'notice-acolyte.edit',
                'notice-acolyte.index',
                'notice-acolyte.store',
                'notice-acolyte.update',
            ],
            // id 8
            'Lektor' => [
                'admin.dashboard',
                'notice-lecturer.create',
                'notice-lecturer.destroy',
                'notice-lecturer.edit',
                'notice-lecturer.index',
                'notice-lecturer.store',
                'notice-lecturer.update',
            ],
            // id 9
            'Hosť' => [
                'admin.dashboard',
            ],
        ];

        foreach ($nameRoles as $name => $permissions) {
            $role = Role::create(['name' => $name]);
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        };
    }
}


