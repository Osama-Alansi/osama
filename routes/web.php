<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\NewsController;
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
    $data=[];
    $data['id']=5;
    $data['name']='Osama Alansi';

    return view('welcome',$data);
});

Route::get('/test1', function () {
    return 'welcome';
}); 


//route parameters   //عمل روت واضافه له عنصر 

Route::get('/test2/{id}', function ($id) {
    return $id;
}); 

Route::get('/test3/{id?}', function () {
    return 'welcome';
}); 

//Route Name  //تعمل اسم للراوت واتستدعيه بالاسم


Route::get('/show-int/{id}', function ($id) {
    return $id;
}) -> name('a'); 

Route::get('/show-string/{id?}', function () {
    return 'welcome Osama';
})-> name('b'); 

Route::namespace('Front')->group(function(){
    //all route only access  controller or methods in folder name Front
    // يعمل راوت لكل الملفات الموجودة داخل مجلد الفرونت 
    Route::get('users', 'UserControllers@ShowUuserName' );
});


Route::get('check', function () {
    return 'middleware';
})->middleware('auth'); 

Route::get('second', [SecondController::class,'a']);

//Rout Group And Middleware

Route::group(['prefix'=>'users','middleware'=>'auth'],function(){

    Route::get('/', function () {
        return 'work';
    });
});
Route::group(['namespace'=>'Admin'],function () {
    Route::get('s1', [SecondController::class,'a'])->middleware('auth');
    Route::get('s2', [SecondController::class,'b']);
    Route::get('s3', [SecondController::class,'c']);
    Route::get('indxe', [SecondController::class,'indxe']);
    
});

Route::get('login', function () {

     return 'Mudt Be Login To Access Thes Route';
})->name('login');

//Route Resoures  // get and pust يكون فية كل شي من

Route::resource('news', NewsController::class);


////views   //المكان الذي يكون فية الصفحات

// Route::get('indxe', [SecondController::class,'indxe']);

Route::get('logo', function () {
    return view('logo');
    
});

Route::get('aput', function () {
    return view('aput');
    
});


Auth::routes(['verify'=> 'true']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') -> middleware('verified');


