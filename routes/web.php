<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminManageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LiveTvController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return view('frontend.index');
// });

Route::controller(IndexController::class)->group(function(){
    Route::get('/', 'Index')->name('index');
});

Route::middleware('auth')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/dashboard', 'UserDashboard')->name('dashboard');
        Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
        Route::get('/user/logout', 'UserLogout')->name('user.logout');
        Route::get('/user/change/password', 'UserChangePassword')->name('user.change.password');
        Route::post('/user/update/password', 'UserUpdatePassword')->name('user.update.password');
    });

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/user/comments', 'UserComments')->name('user.comments');
        Route::get('/delete/comment/{id}', 'DeleteComment')->name('delete.comment');
        Route::get('/edit/comment/{id}', 'EditComment')->name('edit.comment');
        Route::post('/update/comment', 'UpdateComment')->name('update.comment');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
        Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password', 'AdminChangePassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory/{id}', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');
    });

    Route::controller(AdminManageController::class)->group(function(){
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');

        Route::post('/change/admin/status', 'ChangeAdminStatus')->name('change.admin.status');
    });

    Route::controller(NewsPostController::class)->group(function(){
        Route::get('/all/news/post', 'AllNewsPost')->name('all.news.post');
        Route::get('/add/news/post', 'AddNewsPost')->name('add.news.post');
        Route::post('/store/news/post', 'StoreNewsPost')->name('store.news.post');
        Route::get('/edit/news/post/{id}', 'EditNewsPost')->name('edit.news.post');
        Route::post('/update/news/post/{id}', 'UpdateNewsPost')->name('update.news.post');
        Route::get('/delete/news/post/{id}', 'DeleteNewsPost')->name('delete.news.post');

        Route::get('/subcategory/ajax/{id}', 'GetSubCategory');
        Route::post('/change/post/status', 'ChangePostStatus')->name('change.post.status');
    });

    Route::controller(BannerController::class)->group(function(){
        Route::get('/all/banners', 'AllBanners')->name('all.banners');
        Route::post('/update/banners', 'UpdateBanners')->name('update.banners');
    });

    Route::controller(PhotoGalleryController::class)->group(function(){
        Route::get('/all/photo/gallery', 'AllPhotoGallery')->name('all.photo.gallery');
        Route::get('/add/photo/gallery', 'AddPhotoGallery')->name('add.photo.gallery');
        Route::post('/store/photo/gallery', 'StorePhotoGallery')->name('store.photo.gallery');
        Route::get('/edit/photo/gallery/{id}', 'EditPhotoGallery')->name('edit.photo.gallery');
        Route::post('/update/photo/gallery', 'UpdatePhotoGallery')->name('update.photo.gallery');
        Route::get('/delete/photo/gallery/{id}', 'DeletePhotoGallery')->name('delete.photo.gallery');
    });

    Route::controller(VideoGalleryController::class)->group(function(){
        Route::get('/all/video/gallery', 'AllVideoGallery')->name('all.video.gallery');
        Route::get('/add/video/gallery', 'AddVideoGallery')->name('add.video.gallery');
        Route::post('/store/video/gallery', 'StoreVideoGallery')->name('store.video.gallery');
        Route::get('/edit/video/gallery/{id}', 'EditVideoGallery')->name('edit.video.gallery');
        Route::post('/update/video/gallery', 'UpdateVideoGallery')->name('update.video.gallery');
        Route::get('/delete/video/gallery/{id}', 'DeleteVideoGallery')->name('delete.video.gallery');
    });

    Route::controller(LiveTvController::class)->group(function(){
        Route::get('/update/live/tv', 'UpdateLiveTv')->name('update.live.tv');
        Route::post('/store/live/tv', 'StoreLiveTv')->name('store.live.tv');
    });

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/pending/review', 'PendingReview')->name('pending.review');
        Route::get('/approve/review/{id}', 'ApproveReview')->name('approve.review');
        Route::get('/approved/review', 'ApprovedReview')->name('approved.review');
        Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
    });
});

Route::controller(NewsPostController::class)->group(function(){
    Route::get('/frontend/subcategory/{id}', 'GetSubCategoryPosts');
    Route::get('/frontend/category/{id}', 'GetCategoryPosts');
});

Route::controller(IndexController::class)->group(function(){
    Route::get('/news/details/{id}/{slug}', 'NewsDetails');
    Route::get('/news/category/{id}/{slug}', 'NewsCategory')->name('news.category');
    Route::get('/news/subcategory/{id}/{slug}', 'NewsSubCategory')->name('news.subcategory');
    Route::get('/news/archive', 'NewsArchive')->name('news.archive');
    Route::post('/search/by/date', 'SearchByDate')->name('search.by.date');
});

Route::controller(ReviewController::class)->group(function(){
    Route::post('/store/review', 'StoreReview')->name('store.review');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');

require __DIR__.'/auth.php';
