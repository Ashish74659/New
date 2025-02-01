<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Interfaces\TaxRepositoryInterfaces;
use App\Repositories\TaxRepostiory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(TaxRepositoryInterfaces::class, TaxRepostiory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // $lang = Language::where('code', 'en')->first();
        // $all_companies = Company::where('status','Active')->select('name','id','code','vat_no')->get();

        // \View::share('all_companies', $all_companies);
        // \View::share('lang', $lang);


    }


}
