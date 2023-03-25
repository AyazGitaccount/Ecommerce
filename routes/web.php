<?php
use App\Models\Product;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Controllers\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Brand\Index;
use App\Http\Livewire\Frontend\Cartlist;
use App\Http\Livewire\Frontend\Products;
use App\Http\Livewire\Frontend\FrontIndex;
use App\Http\Livewire\Frontend\ViewProduct;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Frontend\ThankYouPage;
use App\Http\Livewire\Frontend\WishlistPage;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Livewire\Frontend\Orders\ViewOrder;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Frontend\Chekcout\Checkout;
use App\Http\Livewire\Frontend\Orders\OrdersList;
use App\Http\Livewire\Frontend\CategoryCollection;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Livewire\Admin\Orders\AdminOrderList;
use App\Http\Livewire\Admin\Orders\ListOfOrder;
use App\Http\Livewire\Admin\SiteSetting\SiteSetting;
use App\Http\Livewire\Frontend\Featured\FeaturedProducts;
use App\Http\Livewire\Frontend\NewArrival\NewArrivalProducts;

Route::get('/', function () {
    return view('welcome');
});
//User side home page routes
Route::get('/home',FrontIndex::class);
Route::get('/collections',CategoryCollection::class);
Route::get('/collections/{slug}',Products::class);
Route::get('/collections/{slug}/{product_slug}',ViewProduct::class);
Route::get('/new_arrival',NewArrivalProducts::class);
Route::get('/featured-products',FeaturedProducts::class);


Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist',WishlistPage::class)->name('wishlist');
    Route::get('/cartlist',Cartlist::class)->name('cart');
    Route::get('/checkout',Checkout::class)->name('checkout');   
    Route::get('/orders',OrdersList::class); 
    Route::get('orders/{order_id}',ViewOrder::class); 
});

Route::get('Thank_you',ThankYouPage::class);

Route::get('/register',Register::class)->name('register');
Route::get('/login',Login::class)->name('login');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function()
{   
    Route::get('dashboard', [dashboardController::class, 'index']);
    // Slider Routes
    Route::controller(SliderController::class)->group(function()
    {
       Route::get('/slider','index');
       Route::get('/slider/create','create');
       Route::post('/slider/create', 'store');
       Route::get('/slider/{slider}/edit', 'edit');
       Route::put('/slider/{slider_id}', 'update');
       Route::get('/slider/{slider_id}/delete', 'delete');

    });
    
    //Category Routes
    Route::controller(CategoryController::class)->group(function()
    {   Route::get('/category', 'index');
        Route::get('/category/{category}/edit', 'edit');
        Route::get('/category/create', 'create')->name('create');
        Route::post('/category','store');
        Route::put('/category/{category}','update');
    });

    //Product routs
    Route::controller(ProductController::class)->group(function()
    {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete', 'destoryImage');
        Route::get('/products/{product_id}/delete', 'destory');
        
        Route::post('/product-color/{prod_color_id}', 'updateProductColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'delete_product_color');

    });

    Route::get('/brands', Index::class);

    Route::controller(ColorController::class)->group(function()
    {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'delete_color');

    });
    //admin side orderslist and view_orders pages
    Route::controller(OrderController::class)->group(function()
    {
        Route::get('/orders','orderview');
        Route::get('/orders/{order_id}','display');
        Route::put('/orders/{order_id}','Update_order_status');
        Route::get('/invoice/{order_id}/generate','generate_inovice');
        Route::get('/invoice/{order_id}','download_inovice');
   });

   //Admin site settings 
   Route::get('/setting',SiteSetting::class);
});



Route::get('/logout',[ Logout::class, 'logout'])->name('logout');