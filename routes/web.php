<?php

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
	// DB::enabledQueryLog();
	$breed = Furbook\Breed::find(1);
	// dd(DB::getQueryLog());
	$cat = Furbook\Cat::find(1);
    return view('wecome');
});

// Route::get('/', function () {
//     return 'all cats';
// });

// Route::get ('cats/{id}', function ($id){
// 	return sprintf('cat #%s', $id);
// });

//  Route::get ('about', function(){
//  	return view ('about')->with('number_of_cats',9000);
//  });

// Route::get('cats/{id}', function ($id){
// 	sprintf('Cat #%d', $id);
// }) ->where ('id', '[0-9]+');

 Route::get('/', function(){
 	return redirect('cats');
 });

 Route::get ('/cats}', function (){
 	$cats = Furbook\Cat::all();
 	//dd($cats);
 	return view('cat.index')->with('cats', $cats);
 })->name('cat.index');

//
Route::get ('/cats/breeds/{name}', function ($name){
	$breed = Furbook\Breed::where('name',$name)
	->get();// hiển thị tất cả các phần tử trong mảng
	// ->first(); // lấy 1 phần tử
 	
 	return 'show list cats belong to breed' .$name;
 })->name('cat.breed');

//
Route::get ('/cats/breeds/{id}', function ($id){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'show detail of cat #' . $id;
 })->name('cat.show')->where('id', '[0-9]+');


//
Route::get ('/cats/breeds/create', function (){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'show form createt cat #';
 })->name('cat.create');

//insert cat
Route::get ('/cats', function (){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'insert new cat';
 })->name('cat.store');

//edit cat
Route::get ('/cats/{id}/edit', function ($id){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'show form edit cat #' .$id;
 })->name('cat.edit');

//update cat
Route::get ('/cats', function (){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'update cat';
 })->name('cat.update');

// delete cat
Route::get ('/cats/{id}', function ($id){
 	// $cats = Furbook\Cat::all();
 	// //dd($cats);
 	return 'Delete cat #' .$id;
 })->name('cat.destroy');
