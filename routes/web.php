<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\CheckRole;
use App\Mail\TestLaravelMail;


/*Ruta de Inicio*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

/*Generar rutas de autenticación*/
Auth::routes();


/*Home*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Rutas a Políticas*/
/*Politica de Privacidad*/
Route::get('/privacy-policy', function () {
    return view('legal/privacypolicy');
})->name('privacy-policy');
/*Aviso legal*/
Route::get('/legal-notice', function () {
    return view('legal/legalnotice');
})->name('legal-notice');
/*Politica de Cookies*/
Route::get('/cookies-policy', function () {
    return view('legal/cookiespolicy');
})->name('cookies-policy');
/*Condiciones de Uso y ventas*/
Route::get('/conditions-of-sale', function () {
    return view('legal/conditions');
})->name('conditions-of-sale');

/*Rutas a Adicional*/
/*Cómo Comprar*/
Route::get('/buying', function () {
    return view('aditional/buying');
})->name('buying');
/*Cómo Vender*/
Route::get('/selling', function () {
    return view('aditional/selling');
})->name('selling');
/*Cómo Intercambiar*/
Route::get('/exchanging', function () {
    return view('aditional/exchanging');
})->name('exchanging');
/*Protección del vendedor*/
Route::get('/seller-protections', function () {
    return view('aditional/sellerprotections');
})->name('seller-protections');



/*Ruta a lo más vendido*/
Route::get('/popular', function () {
    return view('navs/popular');
})->name('popular');

/*Ruta a las ofertas*/
Route::get('/offers', function () {
    return view('navs/offers');
})->name('offers');


/*Ruta a las acciones*/
Route::get('/buy', function () {
    return view('actions/buy');
})->name('buy');

Route::get('/sell', function () {
    return view('actions/sell');
})->name('sell');

Route::get('/exchange', function () {
    return view('actions/exchange');
})->name('exchange');



/*Ruta de la vista del producto*/
Route::get('/show', function () {
    return view('product/show');
})->name('show');











//Rutas de Usuario NO Registrados
//Contraseña Olvidada
Route::post('password/generate', [PasswordController::class, 'processForgetPassword'])->name('password/generate');
//Usuarios
Route::post('/register', [UserController::class, 'register'])->name('register');
//Productos
Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/buy', [ProductController::class, 'exploreProducts'])->name('buy');
Route::get('/find-product', [ProductController::class, 'search'])->name('product.search');

/*Rutas a Categories*/
Route::get('categories/technology', [CategorieController::class, 'electronics'])->name('categories/technology');
Route::get('categories/home-appliances', [CategorieController::class, 'homeappliances'])->name('categories/home-appliances');
Route::get('categories/clothes', [CategorieController::class, 'clothes'])->name('categories/clothes');
Route::get('categories/household-items', [CategorieController::class, 'household'])->name('categories/household-items');

//Rutas del administrador
Route::middleware(['auth', 'admin'])->group(function () {
    //Categorias
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories/index');
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories/create');
    Route::get('/categories/edit/{id}', [CategorieController::class, 'edit'])->name('categories/edit');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories/store');
    Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories/update');
    Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories/destroy');

    //Panel Admin
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin/users');
    Route::get('/admin/create', [AdminController::class, 'showCreateAdminForm'])->name('admin/create');
    Route::post('/admin/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('admin/make-admin');
    Route::post('/admin/create', [AdminController::class, 'createAdmin'])->name('admin/create');
    Route::get('admin/panel', function () {
        return view('admin/panel');
    })->name('admin/panel');
});

//Rutas del Usuario Registrado
Route::middleware(['auth'])->group(function () {
    //Usuarios
    Route::delete('/delete-user', [UserController::class, 'delete'])->name('delete-user');
    Route::post('/edit-user', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/my-products', [UserController::class, 'showUserProducts'])->name('my-products');
    /*Ruta del editar usuario*/
    Route::get('/edit-user', function () {
        return view('profile/edit-user');
    })->name('edit-user');

    /*Ruta del ver perfil usuario*/
    Route::get('/show-profile', function () {
        return view('profile/show-profile');
    })->name('show-profile');

    /*Ruta del eliminar usuario*/
    Route::get('/delete-user', function () {
        return view('profile/delete-user');
    })->name('delete-user');

     

    //Carrito
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart/remove');

    //Intercambio
    Route::get('/exchange-product/{id}', [ExchangeController::class, 'showExchange'])->name('exchange-product');
    Route::get('/uploadExchange/{id}', [ExchangeController::class, 'confirmExchange'])->name('confirmExchange');
    Route::post('/uploadExchange/{id}', [ExchangeController::class, 'uploadExchange'])->name('uploadExchange');
    Route::get('/rejectExchange/{id}', [ExchangeController::class, 'rejectExchangeShow'])->name('rejectExchange');
    Route::post('/rejectExchange/{id}', [ExchangeController::class, 'rejectExchange'])->name('rejectExchange');
    Route::get('/acceptExchange/{id}', [ExchangeController::class, 'acceptExchangeShow'])->name('acceptExchange');
    Route::post('/acceptExchange/{id}', [ExchangeController::class, 'acceptExchange'])->name('acceptExchange');


    //Compra
    Route::get('/purchase/{id}', [PurchaseController::class, 'showPurchase'])->name('purchase');
    Route::post('/process-purchase/{id}', [PurchaseController::class, 'processPurchase'])->name('processPurchase');
    Route::get('/verifyPurchase/{id}', [PurchaseController::class, 'verifyPurchase'])->name('verifyPurchase');

    //Descargar pdf factura
    Route::get('/verifyPurchase/{id}/invoice', [PurchaseController::class, 'downloadPDF'])->name('downloadPDF');

    //Borrar producto
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');

    //Crear
    Route::post('/upload-product', [ProductController::class, 'store'])->name('upload-product');

    //Editar y actualizar producto
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::post('/edit-product/{id}', [ProductController::class, 'update'])->name('update-product');
    
    /*Ruta de la subida del producto*/
    Route::get('/upload-product', function () {
        return view('actions/upload-product');
    })->name('upload-product');

    //Reseña
    Route::post('/show/{id}', [ProductController::class, 'addComment'])->name('addComment');
});


