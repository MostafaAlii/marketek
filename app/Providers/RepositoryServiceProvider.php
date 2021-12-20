<?php
namespace App\Providers;
use App\Interfaces\Groups\GroupRepositoryInterface;
use App\Repository\Groups\GroupRepository;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Repository\Categories\CategoryRepository;
use App\Interfaces\SubCategories\SubCategoryRepositoryInterface;
use App\Repository\SubCategories\SubCategoryRepository;
use App\Interfaces\Suppliers\SuppliersInterface;
use App\Repository\Suppliers\SuppliersRepository;
use App\Interfaces\Countries\CountryRepositoryInterface;
use App\Repository\Countries\CountriesRepository;
use App\Interfaces\Currencies\CurrencRepositoryInterface;
use App\Repository\Currencies\CurrencyRepository;
use App\Interfaces\Provinces\ProvinceRepositoryInterface;
use App\Repository\Provinces\ProvinceRepository;
use App\Interfaces\Areas\AreaRepositoryInterface;
use App\Repository\Areas\AreaRepository;
use App\Interfaces\Cities\CityRepositoryInterface;
use App\Repository\Cities\CityRepository;
// Api
use App\Interfaces\Api\GroupsApiRepositoryInterface;
use App\Repository\Api\GroupsApiRepository;
use App\Interfaces\Api\CategoryApiRepositoryInterface;
use App\Repository\Api\CategoriesApiRepository;
use App\Interfaces\Api\CountriesApiRepositoryInterface;
use App\Repository\Api\CountriesApiRepository;
use App\Interfaces\Api\ProvincesApiRepositoryInterface;
use App\Repository\Api\ProvincesApiRepository;
use App\Interfaces\Api\CitiesRepositoryInterface;
use App\Repository\Api\CitiesRepository;
use App\Interfaces\Api\AreaApiRepositoryInterface;
use App\Repository\Api\AreaApiRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(SuppliersInterface::class, SuppliersRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountriesRepository::class);
        $this->app->bind(CurrencRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->bind(AreaRepositoryInterface::class, AreaRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        // Api Binding ::
        $this->app->bind(GroupsApiRepositoryInterface::class, GroupsApiRepository::class);
        $this->app->bind(CategoryApiRepositoryInterface::class, CategoriesApiRepository::class);
        $this->app->bind(CountriesApiRepositoryInterface::class, CountriesApiRepository::class);
        $this->app->bind(ProvincesApiRepositoryInterface::class, ProvincesApiRepository::class);
        $this->app->bind(CitiesRepositoryInterface::class, CitiesRepository::class);
        $this->app->bind(AreaApiRepositoryInterface::class, AreaApiRepository::class);
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
