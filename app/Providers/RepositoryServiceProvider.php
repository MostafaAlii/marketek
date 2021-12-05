<?php
namespace App\Providers;
use App\Interfaces\Groups\GroupRepositoryInterface;
use App\Repository\Groups\GroupRepository;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Repository\Categories\CategoryRepository;
use App\Interfaces\SubCategories\SubCategoryRepositoryInterface;
use App\Repository\SubCategories\SubCategoryRepository;
use App\Interfaces\Suppliers\SuppliersRepositoryInterface;
use App\Repository\Suppliers\SuppliersRepository;
//use App\Repository\Suppliers\SuppliersRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(SuppliersRepositoryInterface::class, SuppliersRepository::class);
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
