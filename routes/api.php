<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['auth:api', 'user_status']], function () {
    Route::get('user/info', function (Request $request) {
        return $request->user();
    });
    Route::post('products', function (Request $request) {
        return \App\Models\ProductModel::query()->create([
            'title' => $request->get('title'),
            'amount' => $request->get('amount'),
            'vat_sum' => 0,
            'status' => 1
        ]);
    });
    Route::get('saloon', function (Request $request) {
        $get_request = new \App\Http\Integrations\Main\Requests\HttpBinGetRequest();
        $connector = new \App\Http\Integrations\Main\HttpBinConnector();
        $response = $connector->send($get_request);
        return $response->body();
    });
    Route::get('saloon/solo', function (Request $request) {
        try {
            $connector = new \App\Http\Integrations\Main\HttpStatSoloRequest();
            $response = $connector->send();
            if ($response->failed()) {
                return response()->json('test', 400);
            }
            $response->onError(function ($error) {
                return response()->json($error, 400);
            });
            return response()->json($response->body(), $response->status());
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    });
});
