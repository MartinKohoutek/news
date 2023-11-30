<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminManageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LiveTvController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SeoSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
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

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
        Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password', 'AdminChangePassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');

        Route::post('/mark-notification-as-read/{id}', 'MarkNotificationAsRead');
        Route::get('/mark-all-as-read', 'MarkAllAsRead')->name('mark-all-as-read');
    });

    Route::middleware('permission:category.menu')->group(function(){
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/all/category', 'AllCategory')->name('all.category')->middleware('permission:category.list');
            Route::get('/add/category', 'AddCategory')->name('add.category')->middleware('permission:category.add');
            Route::post('/store/category', 'StoreCategory')->name('store.category')->middleware('permission:category.add');
            Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category')->middleware('permission:category.edit');
            Route::post('/update/category', 'UpdateCategory')->name('update.category')->middleware('permission:category.edit');
            Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category')->middleware('permission:category.delete');
        });
    });

    Route::middleware('permission:subcategory.menu')->group(function(){
        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory')->middleware('permission:subcategory.list');
            Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory')->middleware('permission:subcategory.add');
            Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory')->middleware('permission:subcategory.add');
            Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory')->middleware('permission:subcategory.edit');
            Route::post('/update/subcategory/{id}', 'UpdateSubCategory')->name('update.subcategory')->middleware('permission:subcategory.edit');
            Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory')->middleware('permission:subcategory.delete');
        });
    });

    Route::middleware('permission:setting.menu')->group(function(){
        Route::controller(AdminManageController::class)->group(function(){
            Route::get('/all/admin', 'AllAdmin')->name('all.admin');
            Route::get('/add/admin', 'AddAdmin')->name('add.admin');
            Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
            Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
            Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
            Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
            
            Route::post('/change/admin/status', 'ChangeAdminStatus')->name('change.admin.status');
        });
    });

    Route::middleware('permission:news.menu')->group(function(){
        Route::controller(NewsPostController::class)->group(function(){
            Route::get('/all/news/post', 'AllNewsPost')->name('all.news.post')->middleware('permission:news.list');
            Route::get('/add/news/post', 'AddNewsPost')->name('add.news.post')->middleware('permission:news.add');
            Route::post('/store/news/post', 'StoreNewsPost')->name('store.news.post')->middleware('permission:news.add');
            Route::get('/edit/news/post/{id}', 'EditNewsPost')->name('edit.news.post')->middleware('permission:news.edit');
            Route::post('/update/news/post/{id}', 'UpdateNewsPost')->name('update.news.post')->middleware('permission:news.edit');
            Route::get('/delete/news/post/{id}', 'DeleteNewsPost')->name('delete.news.post')->middleware('permission:news.delete');
            
            Route::get('/subcategory/ajax/{id}', 'GetSubCategory');
            Route::post('/change/post/status', 'ChangePostStatus')->name('change.post.status');
        });
    });

    Route::middleware('permission:banner.menu')->group(function(){
        Route::controller(BannerController::class)->group(function(){
            Route::get('/all/banners', 'AllBanners')->name('all.banners');
            Route::post('/update/banners', 'UpdateBanners')->name('update.banners');
        });
    });

    Route::middleware('permission:photo.menu')->group(function(){
        Route::controller(PhotoGalleryController::class)->group(function(){
            Route::get('/all/photo/gallery', 'AllPhotoGallery')->name('all.photo.gallery')->middleware('permission:photo.list');
            Route::get('/add/photo/gallery', 'AddPhotoGallery')->name('add.photo.gallery')->middleware('permission:photo.add');
            Route::post('/store/photo/gallery', 'StorePhotoGallery')->name('store.photo.gallery')->middleware('permission:photo.add');
            Route::get('/edit/photo/gallery/{id}', 'EditPhotoGallery')->name('edit.photo.gallery')->middleware('permission:photo.edit');
            Route::post('/update/photo/gallery', 'UpdatePhotoGallery')->name('update.photo.gallery')->middleware('permission:photo.edit');
            Route::get('/delete/photo/gallery/{id}', 'DeletePhotoGallery')->name('delete.photo.gallery')->middleware('permission:photo.delete');
        });
    });

    Route::middleware('permission:video.menu')->group(function(){
        Route::controller(VideoGalleryController::class)->group(function(){
            Route::get('/all/video/gallery', 'AllVideoGallery')->name('all.video.gallery')->middleware('permission:video.list');
            Route::get('/add/video/gallery', 'AddVideoGallery')->name('add.video.gallery')->middleware('permission:video.add');
            Route::post('/store/video/gallery', 'StoreVideoGallery')->name('store.video.gallery')->middleware('permission:video.add');
            Route::get('/edit/video/gallery/{id}', 'EditVideoGallery')->name('edit.video.gallery')->middleware('permission:video.edit');
            Route::post('/update/video/gallery', 'UpdateVideoGallery')->name('update.video.gallery')->middleware('permission:video.edit');
            Route::get('/delete/video/gallery/{id}', 'DeleteVideoGallery')->name('delete.video.gallery')->middleware('permission:video.delete');
        });
    });

    Route::middleware('permission:live.menu')->group(function(){
        Route::controller(LiveTvController::class)->group(function(){
            Route::get('/update/live/tv', 'UpdateLiveTv')->name('update.live.tv');
            Route::post('/store/live/tv', 'StoreLiveTv')->name('store.live.tv');
        });
    });

    Route::middleware('permission:review.menu')->group(function(){
        Route::controller(ReviewController::class)->group(function(){
            Route::get('/pending/review', 'PendingReview')->name('pending.review');
            Route::get('/approve/review/{id}', 'ApproveReview')->name('approve.review');
            Route::get('/approved/review', 'ApprovedReview')->name('approved.review');
            Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
        });
    });

    Route::middleware('permission:seo.menu')->group(function(){
        Route::controller(SeoSettingController::class)->group(function(){
            Route::get('/seo/setting', 'SeoSiteSetting')->name('seo.setting');
            Route::post('/update/seo/setting/{id}', 'UpdateSeoSetting')->name('update.seo.setting');
        });
    });

    Route::middleware('permission:role.menu')->group(function(){
        Route::controller(RoleController::class)->group(function(){
            Route::get('/all/permission', 'AllPermission')->name('all.permission');
            Route::get('/add/permission', 'AddPermission')->name('add.permission');
            Route::post('/store/permission', 'StorePermission')->name('store.permission');
            Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
            Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
            Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
            
            
            Route::get('/all/roles', 'AllRoles')->name('all.roles');
            Route::get('/add/roles', 'AddRoles')->name('add.roles');
            Route::post('/store/roles', 'StoreRoles')->name('store.roles');
            Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
            Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
            Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

            Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
            Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
            Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
            Route::get('/edit/roles/permission/{id}', 'EditRolesPermission')->name('edit.roles.permission');
            Route::post('/update/roles/permission/{id}', 'UpdateRolesPermission')->name('update.roles.permission');
            Route::get('/delete/roles/permission/{id}', 'DeleteRolesPermission')->name('delete.roles.permission');
        });
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
    Route::get('/search/by/date', 'SearchByDate')->name('search.by.date');
    Route::get('/news/search', 'NewsSearch')->name('news.search');
    Route::get('/reporter/all/news/{id}', 'ReporterAllNews')->name('reporter.all.news');
    Route::get('/news/by/tag/{title}', 'NewsByTag')->name('news.by.tag.title');
});

Route::controller(ReviewController::class)->group(function(){
    Route::post('/store/review', 'StoreReview')->name('store.review');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');

require __DIR__.'/auth.php';
