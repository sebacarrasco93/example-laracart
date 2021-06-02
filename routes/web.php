<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    dd($laracart);
});

Route::get('/add/{times?}', function ($times = 1) {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    $itemOne = [
        'uuid' => '111AAA',
        'name' => "Lemon Waffle by SoloWaffles",
        'price' => '8.5',
    ];

    $itemTwo = [
        'uuid' => '222BBB',
        'name' => "Super Waffle by SoloWaffles",
        'price' => '5.5',
    ];

    for ($i=1; $i<=$times; $i++) {
        $laracart->add($itemOne);
        $laracart->add($itemTwo);
    }
});

Route::get('/get', function () {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    return $laracart->get();
});

Route::get('/flush', function () {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    return $laracart->flush();
});

Route::get('/findByUuid/{uuid?}', function (string $uuid = '111AAA') {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    return $laracart->findByUuid($uuid);
});

Route::get('/delete/{uuid?}', function (string $uuid = '111AAA') {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    $laracart->delete($uuid);
});

Route::get('/update/{uuid?}', function (string $uuid = '111AAA') {
    $laracart = new \SebaCarrasco93\LaraCart\LaraCart();

    $newItem = [
        'uuid' => '333CCC',
        'name' => "Another Waffle by SoloWaffles",
        'price' => '11.99',
        'anotherFields' => [
            'extra-data' => [
                'Without sausage',
            ],
            'special_note' => 'Thank you',
        ],
    ];

    $laracart->update($uuid, $newItem);
});
