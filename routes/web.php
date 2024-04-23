<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// HOME
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');
Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'calendar'])
->name('calendar');

//Account Admmin
Route::get('/profile', [App\Http\Controllers\EmployeeController::class, 'profile'])
->name('profile');
Route::get('/account', [App\Http\Controllers\EmployeeController::class, 'account'])
->name('account');
Route::post('/account/update', [App\Http\Controllers\EmployeeController::class, 'updateUser'])
->name('account.update');

// product
Route::group(['prefix'=>'products'],function(){
    route::get('/',[App\Http\Controllers\ProductController::class,'index'])
    ->middleware('auth','permission:product,product_read')
    ->name('product');
    route::get('/create',[App\Http\Controllers\ProductController::class,'create'])
    ->middleware('auth','permission:product,product_create')
    ->name('product.add');
    route::post('/store',[App\Http\Controllers\ProductController::class,'store'])
    ->middleware('auth','permission:product,product_create')
    ->name('product.store');
    route::get('/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])
    ->middleware('auth','permission:product,product_update')
    ->name('product.edit');
    route::post('/update',[App\Http\Controllers\ProductController::class,'update'])
    ->middleware('auth','permission:product,product_update')
    ->name('product.update');
    route::get('/delete/{id}',[App\Http\Controllers\ProductController::class,'destroy'])
    ->middleware('auth','permission:product,product_delete')
    ->name('product.delete');
    route::get('/report',[App\Http\Controllers\ProductController::class,'report'])
    ->middleware('auth','permission:product,product_report')
    ->name('product.report');
});

// SECTION
Route::group(['prefix'=>'sections'],function(){
    route::get('/',[App\Http\Controllers\SectionController::class,'index'])
    ->middleware('auth','permission:product,section_read')
    ->name('section');
    route::get('/create',[App\Http\Controllers\SectionController::class,'create'])
    ->middleware('auth','permission:product,section_create')
    ->name('section.add');
    route::post('/store',[App\Http\Controllers\SectionController::class,'store'])
    ->middleware('auth','permission:product,section_create')
    ->name('section.store');
    route::get('/edit/{id}',[App\Http\Controllers\SectionController::class,'edit'])
    ->middleware('auth','permission:product,section_update')
    ->name('section.edit');
    route::post('/update',[App\Http\Controllers\SectionController::class,'update'])
    ->middleware('auth','permission:product,section_update')
    ->name('section.update');
    route::get('/delete/{id}',[App\Http\Controllers\SectionController::class,'destroy'])
    ->middleware('auth','permission:product,section_delete')
    ->name('section.delete');
});
//ORDER
Route::group(['prefix'=>'orders'],function(){
    route::get('/',[App\Http\Controllers\OrderController::class,'index'])
    ->middleware('auth','permission:order,order_read')
    ->name('order');
    route::get('/invoice/{client_id}',[App\Http\Controllers\OrderController::class,'invoice'])
    ->middleware('auth','permission:order,order_create')
    ->name('invoice');
    route::get('/create',[App\Http\Controllers\OrderController::class,'create'])
    ->middleware('auth','permission:order,order_create')
    ->name('order.add');
    route::post('/store',[App\Http\Controllers\OrderController::class,'store'])
    ->middleware('auth','permission:order,order_create')
    ->name('order.store');

    route::get('/delete/{id}',[App\Http\Controllers\OrderController::class,'destroy'])
    ->middleware('auth','permission:order,order_delete')
    ->name('order.delete');
    route::get('/day_sale',[App\Http\Controllers\OrderController::class,'daySale'])
    ->middleware('auth','permission:order,order_day')
    ->name('order.day_sale');
    route::get('/my_orders/{id}',[App\Http\Controllers\OrderController::class,'myOrder'])
    ->middleware('auth','permission:order,order_me')
    ->name('order.my');
    ////////test search
    route::post('/search',[App\Http\Controllers\OrderController::class,'Search'])
    ->middleware('auth','permission:order,order_me')
    ->name('order.search');
});
//CLIENT
Route::group(['prefix'=>'clients','middleware'=>'auth'],function(){
    route::get('/',[App\Http\Controllers\ClientController::class,'index'])
    ->middleware('auth','permission:product,order_read')
    ->name('client');
    route::get('/create',[App\Http\Controllers\ClientController::class,'create'])
    ->middleware('auth','permission:product,order_read')
    ->name('client.add');
    //empty
    route::post('/store',[App\Http\Controllers\OrderController::class,'store'])
    ->middleware('auth','permission:product,order_read')
    ->name('client.store');
    route::get('/edit/{id}',[App\Http\Controllers\OrderController::class,'edit'])
    ->middleware('auth','permission:product,order_read')
    ->name('client.edit');
    route::post('/update',[App\Http\Controllers\OrderController::class,'update'])
    ->middleware('auth','permission:product,order_read')
    ->name('client.update');
    route::get('/delete/{id}',[App\Http\Controllers\OrderController::class,'destroy'])
    ->middleware('auth','permission:product,order_read')
    ->name('client.delete');
});
//TEMP
Route::group(['prefix'=>'temp'],function(){
    route::get('/',[App\Http\Controllers\TempController::class,'index'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp');
    route::get('/temp',[App\Http\Controllers\TempController::class,'create'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.add');


    route::post('/temp/client',[App\Http\Controllers\TempController::class,'createClient'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.client.add');
    route::post('/temp/client/axing',[App\Http\Controllers\TempController::class,'createAxing'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.client.axing.add');
    route::post('/temp/product',[App\Http\Controllers\TempController::class,'createProduct'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.product.add');


    route::post('/store',[App\Http\Controllers\TempController::class,'store'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.store');
    route::get('/edit/{id}',[App\Http\Controllers\TempController::class,'edit'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.edit');
    route::post('/update',[App\Http\Controllers\TempController::class,'update'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.update');
    route::get('/delete/{id}',[App\Http\Controllers\TempController::class,'destroy'])
    ->middleware('auth','permission:product,order_create')
    ->name('temp.delete');
});

// STOCK
Route::group(['prefix'=>'stocks'],function(){
    route::get('/',[App\Http\Controllers\StockController::class,'index'])
    ->middleware('auth','permission:product,stock_read')
    ->name('stock');
    route::get('/create',[App\Http\Controllers\StockController::class,'create'])
    ->middleware('auth','permission:product,stock_create')
    ->name('stock.add');
    route::post('/store',[App\Http\Controllers\StockController::class,'store'])
    ->middleware('auth','permission:product,stock_create')
    ->name('stock.store');
    route::post('/add_cash',[App\Http\Controllers\StockController::class,'addCash'])
    ->middleware('auth','permission:product,stock_create')
    ->name('stock.add_cash');
    route::post('/pull_cash',[App\Http\Controllers\StockController::class,'pullCash'])
    ->middleware('auth','permission:product,stock_create')
    ->name('stock.pull_cash');
    route::get('/edit/{id}',[App\Http\Controllers\StockController::class,'edit'])
    ->middleware('auth','permission:product,stock_update')
    ->name('stock.edit');
    route::post('/update',[App\Http\Controllers\StockController::class,'update'])
    ->middleware('auth','permission:product,stock_update')
    ->name('stock.update');
    route::get('/delete/{id}',[App\Http\Controllers\StockController::class,'destroy'])
    ->middleware('auth','permission:product,stock_delete')
    ->name('stock.delete');
});
// EMPLOYEE
Route::group(['prefix'=>'employees'],function(){
    route::get('/',[App\Http\Controllers\EmployeeController::class,'index'])
    ->middleware('auth','permission:employee,employee_read')
    ->name('employee');
    route::get('/create',[App\Http\Controllers\EmployeeController::class,'create'])
    ->middleware('auth','permission:employee,employee_create')
    ->name('employee.add');
    route::post('/store',[App\Http\Controllers\EmployeeController::class,'store'])
    ->middleware('auth','permission:employee,employee_create')
    ->name('employee.store');
    route::get('/edit/{id}',[App\Http\Controllers\EmployeeController::class,'edit'])
    ->middleware('auth','permission:employee,employee_update')
    ->name('employee.edit');
    route::post('/update',[App\Http\Controllers\EmployeeController::class,'update'])
    ->middleware('auth','permission:employee,employee_update')
    ->name('employee.update');
    route::get('/delete/{id}',[App\Http\Controllers\EmployeeController::class,'destroy'])
    ->middleware('auth','permission:employee,employee_delete')
    ->name('employee.delete');
});

// REPORT
Route::group(['prefix'=>'reports'],function(){
    route::get('/orders',[App\Http\Controllers\ReportController::class,'ReportOrder'])
    ->middleware('auth','permission:report,report_order')
    ->name('report.orders');
    route::get('/products',[App\Http\Controllers\ReportController::class,'ReportProduct'])
    ->middleware('auth','permission:report,report_product')
    ->name('report.products');
    route::get('/orders/reacted',[App\Http\Controllers\ReportController::class,'reportReactedOrder'])
    ->middleware('auth','permission:report,report_reacted')
    ->name('report.reacted.order');
    route::get('/orders/employee',[App\Http\Controllers\ReportController::class,'reportEmployee'])
    ->middleware('auth','permission:report,report_order')
    ->name('report.employee');
    route::get('/orders/employee/orders/{id}',[App\Http\Controllers\ReportController::class,'reportEmployeeOrder'])
    ->middleware('auth','permission:report,report_order')
    ->name('report.employee.order');
});

