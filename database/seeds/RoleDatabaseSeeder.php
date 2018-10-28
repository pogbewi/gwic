<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create($this->roles(), $this->map());
    }


    private function roles()
    {
        $rows = [
            'admin' => [
                'admin-settings-controller' => 'c,r,u,d',
                'admin-dashboard-controller' => 'c,r,u,d',
                'admin-admin-business-investment-controller' => 'c,r,u,d',
                'admin-admin-contact-controller' => 'c,r,u,d',
                'admin-admin-testimonials-controller' => 'c,r,u,d',
                'admin-admin-posts-controller' => 'c,r,u,d',
                'admin-admin-category-controller' => 'c,r,u,d',
                'admin-admin-investors-controller' => 'c,r,u,d',
                'admin-admin-subscribers-controller' => 'c,r,u,d',
                'admin-admin-log-activity-controller' => 'c,r,u,d',
            ],
            'manager' => [
                'admin-settings-controller'=> 'r,u',
                'admin-business-investment-controller' => 'r,u',
                'admin-admin-posts-controller' => 'r,u',
                'admin-admin-category-controller' => 'r,u',
                'admin-admin-investors-controller' => 'r,u',
                'admin-admin-subscribers-controller' => 'r,u',
                'admin-admin-log-activity-controller' => 'r,u',
            ],
            'moderator' => [

            ],
        ];

        return $rows;
    }

    private function map()
    {
        $rows = [
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete'
        ];

        return $rows;
    }

    private function create($roles, $map)
    {
        $mapPermission = collect($map);

        foreach ($roles as $key => $modules) {
            // Create a new role
            $role = Role::create([
                'name' => $key,
                'display_name' => ucwords(str_replace("_", " ", $key)),
                'description' => ucwords(str_replace("_", " ", $key))
            ]);

            $this->command->info('Creating Role ' . strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {
                $permissions = explode(',', $value);

                foreach ($permissions as $p => $perm) {
                    $permissionValue = $mapPermission->get($perm);

                    $moduleName = ucwords(str_replace("-", " ", $module));

                    $permission = Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . $moduleName,
                        'description' => ucfirst($permissionValue) . ' ' . $moduleName,
                    ]);

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $moduleName);

                    if (!$role->hasPermission($permission->name)) {
                        $role->attachPermission($permission);
                    } else {
                        $this->command->info($key . ': ' . $p . ' ' . $permissionValue . ' already exist');
                    }
                }
            }
        }
    }
}
