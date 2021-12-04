<?php
namespace App\Providers;
use App\Interfaces\Groups\GroupRepositoryInterface;
use App\Repository\Groups\GroupRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
