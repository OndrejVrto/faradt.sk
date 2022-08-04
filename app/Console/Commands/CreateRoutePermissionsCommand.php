<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class CreateRoutePermissionsCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-permission-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission routes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void {
        $routes = Route::getRoutes()->getRoutes();

        foreach ($routes as $route) {
            $routeName = $route->getName();
            if ($routeName != '') {
                foreach ($route->getAction()['middleware'] as $midleware) {
                    if ($midleware == 'permission') {
                        $permission = Permission::where('name', $routeName)->first();
                        if (is_null($permission)) {
                            $this->line('Create permissions: '.$routeName);
                            Permission::create(['name' => $routeName]);
                        }
                    }
                }
            }
        }

        $this->newLine();
        $this->info('Permission routes added successfully.');
    }
}
