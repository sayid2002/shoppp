<?php



    Route::get('/', "IndexController@main");
    Route::get('/main', "IndexController@main")->name("main");
    Route::get('/category/{id}', "IndexController@category")->name("category");
    Route::match(['GET', 'POST'], '/detail/{id}', "IndexController@detail")->name("detail");
    Route::match(['GET', 'POST'], '/products', "IndexController@products")->name("products");
    Route::match(['GET', 'POST'], '/registry', "IndexController@registry")->name("registry");
    Route::match(['GET', 'POST'], '/auth', "IndexController@auth")->name("auth");
    Route::match(['GET', 'POST'], '/cab', "IndexController@cab")->name("cab");
    Route::match(['GET', 'POST'], '/edit', "IndexController@edit")->name("edit");
    Route::match(['GET', 'POST'], '../admin', "IndexController@admin")->name("admin");

    Route::match(['GET', 'POST'], '/exit', "IndexController@exit")->name("exit");
    Route::match(['GET', 'POST'], '/minus/{id}/{qty}', "IndexController@minus")->name("minus");
    Route::match(['GET', 'POST'], '/delcart/{id}', "IndexController@delcart")->name("delcart");
    Route::match(['GET', 'POST'], '/plus/{id}/{qty}', "IndexController@plus")->name("plus");
    Route::match(['GET', 'POST'], '/delete', "IndexController@delete")->name("delete");
    Route::match(['GET', 'POST'], '/succ', "IndexController@succ")->name("succ");
    Route::match(['GET', 'POST'], '/addcart{id}', "IndexController@addcart")->name("addcart");
    Route::match(['GET', 'POST'], '/req{id}', "IndexController@req")->name("req");
    Route::match(['GET', 'POST'], '/cart', "IndexController@cart")->name("cart");
    Route::get('/search/', 'IndexController@search')->name('search');
    Route::get('/ajax/', 'IndexController@ajax')->name('ajax');
    Route::match(['GET','POST'],'/exit', "IndexController@exit")->name("exit");
    Route::match(['GET','POST'],'/checkeradmin', "admin\AdminController@checkeradmin")->name("checkeradmin");
    Route::match(['GET','POST'],'/userbooks/{id}', "IndexController@userbooks")->name("userbooks");


Route::prefix('admin')->group(function() {



    Route::get("/","admin\AdminController@admin")->name("home");
    Route::match(['GET','POST'],'/site', "admin\AdminController@site")->name("site");
    Route::match(['GET','POST'],'/edit', "admin\AdminController@edit")->name("edit");
    Route::match(['GET','POST'],'/delete', "admin\AdminController@delete")->name("delete");
    Route::match(['GET','POST'],'/dellcat/{id}', "admin\AdminController@dellcat")->name("dellcat");
    Route::match(['GET','POST'],'/dellcom/{id}', "admin\AdminController@dellcom")->name("dellcom");

    Route::match(['GET','POST'],'/editcat/{id}', "admin\AdminController@editcat")->name("editcat");
    Route::match(['GET','POST'],'/editcom/{id}', "admin\AdminController@editcom")->name("editcom");
    Route::match(['GET','POST'],'/edittov/{id}', "admin\AdminController@edittov")->name("edittov");
    Route::match(['GET','POST'],'/edituser/{id}', "admin\AdminController@edituser")->name("edituser");
    Route::match(['GET','POST'],'/delluser/{id}', "admin\AdminController@delluser")->name("delluser");
    Route::match(['GET','POST'],'/ordersuser/{id}', "admin\AdminController@ordersuser")->name("ordersuser");
    Route::match(['GET','POST'],'/orders', "admin\AdminController@orders")->name("orders");
    Route::match(['GET','POST'],'/delltov/{id}', "admin\AdminController@delltov")->name("delltov");
    Route::match(['GET','POST'],'/cancelord/{id}', "admin\AdminController@cancelord")->name("cancelord");
    Route::match(['GET','POST'],'/finishord/{id}', "admin\AdminController@finishord")->name("finishord");
    Route::match(['GET','POST'],'/addcat', "admin\AdminController@addcat")->name("addcat");
    Route::match(['GET','POST'],'/addtov', "admin\AdminController@addtov")->name("addtov");
    Route::match(['GET','POST'],'/checkeradmin', "admin\AdminController@checkeradmin")->name("checker");


    Route::match(['GET','POST'],'/category/', "admin\AdminController@category")->name("category");
    Route::match(['GET','POST'],'/tovari/', "admin\AdminController@tovari")->name("tovari");
    Route::match(['GET','POST'],'/news/', "admin\AdminController@news")->name("news");
    Route::match(['GET','POST'],'/commentary/', "admin\AdminController@commentary")->name("commentary");
    Route::match(['GET','POST'],'/users/', "admin\AdminController@users")->name("users");










});