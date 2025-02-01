<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;   
use App\Amyservices\Interfaces\CommonInterface;  

     
use App\Amyservices\Interfaces\AuctionInterfaces;
use App\Amyservices\Interfaces\RFIInterfaces;
use App\Amyservices\RFIService;
use App\Amyservices\CommonService; 


class FDOServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {        
        // $this->app->bind(Workflow_MappingInterface::class, Workflow_MappingService::class);
          
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
