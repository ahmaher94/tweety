<?php

namespace App\Providers;

use Elastic\Elasticsearch\Client as ElasticsearchClient;
use Elastic\Elasticsearch\ClientBuilder as ElasticsearchClientBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ElasticsearchClient::class, function () {
            $cloudId = env('ELASTICSEARCH_CLOUD_ID');
            $apiKey = env('ELASTICSEARCH_API_KEY');

            return ElasticsearchClientBuilder::create()
                ->setElasticCloudId($cloudId)
                ->setApiKey($apiKey)
                ->build();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
