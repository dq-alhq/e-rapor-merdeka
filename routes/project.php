<?php

use Illuminate\Support\Facades\Route;

Route::post('/dimensions', function () {
    $dimensions = \App\Models\Project\Dimension::query()->select('id', 'deskripsi')
        ->where('jenjang', \App\Models\School::query()->first()->jenjang)
        ->get();
    return response()->json($dimensions);
});
Route::post('/elements/{id}', function ($id) {
    $elements = \App\Models\Project\Element::query()->whereDimensionId($id)->select('id', 'deskripsi')->get();
    return response()->json($elements);
});
Route::post('/subelements/{id}', function ($id) {
    $subelements = \App\Models\Project\Subelement::query()->whereElementId($id)->select('id', 'deskripsi')->get();
    return response()->json($subelements);
});
Route::post('/subelement/{id}', function ($id) {
    $subelement = \App\Models\Project\Subelement::query()->find($id)->deskripsi;
    $element = \App\Models\Project\Subelement::query()->find($id)->element->deskripsi;
    $dimension = \App\Models\Project\Subelement::query()->find($id)->element->dimension->deskripsi;
    return response()->json([
        'subelement' => $subelement,
        'element' => $element,
        'dimension' => $dimension
    ]);
});
