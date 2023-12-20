<?php

namespace App\Providers;

use App\Helpers\Moving;
use App\Http\Controllers\PartmentController;
use App\Interface\Ads\AdsRepositoryInterface;
use App\Interface\GalleriesRepositoryInterface;
use App\Interface\hr\EmployeeRepositoryInterface;
use App\Interface\hr\FileManagerRepositoryInterface;
use App\Interface\hr\MessageRepositoryInterface;
use App\Interface\hr\ProfessionRepositoryInterface;
use App\Interface\PartmentRepositoryInterface;
use App\Interface\RoleRepositoryInterface;
use App\Interface\ServicesRepositoryInterface;
use App\Interface\SubscriptionsRepositoryInterface;
use App\Models\Role;
use App\Repository\Ads\AdsRepository;
use App\Repository\ApartmentRepository;
use App\Repository\GalleriesRepository;
use App\Repository\hr\EmployeeRepository;
use App\Repository\hr\MessageRepository;
use App\Repository\hr\ProfessionRepository;
use App\Repository\RoleRepository;
use App\Repository\ServicesRepository;
use App\Repository\SubscriptionsRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(AdsRepositoryInterface::class, AdsRepository::class);

        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);

        $this->app->bind(ProfessionRepositoryInterface::class, ProfessionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);

        $this->app->bind(FileManagerRepositoryInterface::class, FileManagerRepository::class);
        $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class);

        $this->app->bind(SubscriptionsRepositoryInterface::class, SubscriptionsRepository::class);

        $this->app->bind(GalleriesRepositoryInterface::class, GalleriesRepository::class);
        $this->app->bind(ServicesRepositoryInterface::class, ServicesRepository::class);
        $this->app->bind(PartmentRepositoryInterface::class, ApartmentRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if ('role', function ($role) {

            if (Session::get('branch')) {
                $array_branch = Role::where('roles.type', 3)
                ->where(function ($query) {
                    $query->where("roles.link_route", 'not like', '%create%')
                    ->Where("roles.link_route", 'not like', '%setting%');
                })->pluck('roles.link_route')->toArray();
                $el = true;
                foreach (['edit', 'index', 'store', 'update', 'show', 'destory', 'create', 'setting'] as $key => $value) {
                    if (str_contains($role, $value)) {
                        $el = false;
                    }
                }

                if (in_array($role, $array_branch) || $el) {

                    return true;
                } else {
                    return false;

                }

            } elseif (in_array($role, Moving::get_all_permissions())) {
                return true;
            }
            return false;

        });
    }
}
