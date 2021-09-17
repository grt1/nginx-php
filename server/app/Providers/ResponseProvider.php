<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\JsonResponse;

class ResponseProvider extends ServiceProvider
{

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        JsonResponse::macro('success', function ($data) {
            $item = null;
            $items = null;
            $data = response()->json($data);
            if (is_array($data->getData())) {
                $items = $data->getData();
            } else {
                $item = $data->getData();
            }
            $rows = [
                'success' => true,
                'errorCode' => null,
                'message' => null,
                'item' => $item,
                'items' => $items
            ];
            return JsonResponse::create($rows);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
