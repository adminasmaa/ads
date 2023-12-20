<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class CreateRouteRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    //protected $signature = 'command:name';
    protected $signature = 'roles:create-role-routes';
    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Create a role routes.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    /*public function handle()
    {
    return Command::SUCCESS;
    }*/

    public function handle()
    {
        $routes = Route::getRoutes()->getRoutes();
        $main_function_array = ['update,destroy,store'];

        // dd($main_function_array);
        $role_order = Role::where('order', '!=', 50)->max('order');

        foreach ($routes as $route) {
            if ($route->getName() != '' && $route->getAction()['middleware']['0'] == 'web') {
                $permission = Role::where('link_route', $route->getName())->first();

                if (is_null($permission)) {
                    //  Moving::getMoving('اضافة صلاحيات جديدة');
                    // Moving::getMoving('اضافة صلاحيات جديدة');
                    if (str_contains($route->getName(), '.index')) {
                        $main_route = Role::create(['name' => $route->getName(), 'link_route' => $route->getName(), 'main_route' => 1, 'order' => $role_order + 1, 'type' => 3]);

                    } else {

                        $main_route = Role::create(['name' => $route->getName(), 'link_route' => $route->getName(), 'main_route' => 0, 'type' => 3]);

                    }

                    //$main_route=Role::latest()->first();
                    // dd($main_route);
                    // dd($route->route('parameter_name'));

                }
            }
        }

        $this->info('Permission routes added successfully.');
    }

}
