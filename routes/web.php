<?php


use App\Http\Controllers\SslCommerzPaymentController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/',\App\Http\Livewire\HomeComponent::class)->name('home.index');

Route::get('/shop',\App\Http\Livewire\ShopComponent::class)->name('shop');

Route::get('/product/details/{slug}',\App\Http\Livewire\DetailsComponent::class)->name('product.details');

Route::get('/cart',\App\Http\Livewire\CartComponent::class)->name('shop.cart');

Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('shop.checkout');

//product as category & subcategory
Route::get('/product-category/{category_slug}/{scategory_slug?}',\App\Http\Livewire\CategoryComponent::class)->name('product.category');


Route::get('/product/search',\App\Http\Livewire\SearchProductComponent::class)->name('product.search');

Route::get('/contact-us',\App\Http\Livewire\ContactComponent::class)->name('contact');


Route::get('/thank-you',\App\Http\Livewire\ThankyouComponent::class)->name('thankyou');














// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


Route::middleware(['auth'])->group(function(){
    Route::get('user/dashboard',\App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
    Route::get('user/orderdetails/{order_id}',\App\Http\Livewire\User\UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('user/review/{order_item_id}',\App\Http\Livewire\User\UserReviewComponent::class)->name('user.review');

});


Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('admin/dashboard',\App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');


    Route::get('admin/slider',\App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('admin/slider/add',\App\Http\Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.home.slider.add');
    Route::get('admin/slider/edit/{slider_id}',\App\Http\Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.home.slider.edit');


    Route::get('admin/category',\App\Http\Livewire\Admin\AdminCategoryComponent::class)->name('admin.category');
    Route::get('admin/category/add',\App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('admin/category/edit/{category_slug}/{scategory_slug?}',\App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');


    Route::get('admin/product',\App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.product');
    Route::get('admin/product/add',\App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('admin/product/edit/{product_slug}',\App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.product.edit');

    Route::get('admin/setting',\App\Http\Livewire\Admin\AdminSettingComponent::class)->name('admin.setting');

    Route::get('admin/coupon',\App\Http\Livewire\Admin\AdminCouponComponent::class)->name('admin.coupon');
    Route::get('admin/coupon/add',\App\Http\Livewire\Admin\AdminAddCouponComponent::class)->name('admin.coupon.add');


    //For download pdf
    Route::get('admin/coupon/pdf',[\App\Http\Livewire\Admin\AdminCouponPdfComponent::class,'exportPDF'])->name('admin.exportPDF');



    Route::get('admin/banner',\App\Http\Livewire\Admin\AdminBannerComponent::class)->name('admin.banner');
    Route::get('admin/banner/add',\App\Http\Livewire\Admin\AdminAddBannerComponent::class)->name('admin.banner.add');
    Route::get('admin/banner/edit/{banner_slug}',\App\Http\Livewire\Admin\AdminEditBannerComponent::class)->name('admin.banner.edit');

    Route::get('admin/order',\App\Http\Livewire\Admin\AdminOrderComponent::class)->name('admin.order');
    Route::get('admin/orderdetails/{order_id}',\App\Http\Livewire\Admin\AdminOrderDetailsComponent::class)->name('admin.orderdetails');


    Route::get('admin/customer',\App\Http\Livewire\Admin\AdminCustomerComponent::class)->name('admin.customer');
    Route::get('admin/review',\App\Http\Livewire\Admin\AdminReviewComponent::class)->name('admin.review');


});

require __DIR__.'/auth.php';
