<?php

use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Regency;
use App\Models\Location\Village;
use Illuminate\Support\Facades\Route;

Route::post('/provinces', function () {
    $provinces = Province::query()->select('id', 'name')->get();
    return response()->json($provinces);
});
Route::post('/regencies/{id}', function ($id) {
    $regencies = Regency::query()->whereProvinceId($id)->select('id', 'name')->get();
    return response()->json($regencies);
});
Route::post('/districts/{id}', function ($id) {
    $districts = District::query()->whereRegencyId($id)->select('id', 'name')->get();
    return response()->json($districts);
});
Route::post('/villages/{id}', function ($id) {
    $villages = Village::query()->whereDistrictId($id)->select('id', 'name')->get();
    return response()->json($villages);
});
Route::post('/village/{id}', function ($id) {
    $village = Village::query()->find($id)->name;
    $district = Village::query()->find($id)->district->name;
    $regency = Village::query()->find($id)->regency->name;
    $province = Village::query()->find($id)->regency->province->name;
    return response()->json([
        'village' => $village,
        'district' => $district,
        'regency' => $regency,
        'province' => $province
    ]);
});
