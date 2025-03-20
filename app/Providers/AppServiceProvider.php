<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //追記

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Laravel10はデフォルトでTailwindCSSが追加されている。
        // そのためTailwindCSSでなくbootstrapを使う場合などはuseBootstrap、または公式ドキュメントに則ってバージョン指定useBootstrapを使う。
        Paginator::useBootstrap();    //追記
        // Paginator::useBootstrapFive();    公式ドキュメント
        // Paginator::useBootstrapFour();    公式ドキュメント
    }
}
