<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\SocialloginController;
use Illuminate\Support\Facades\Artisan;

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

// Home START
Route::middleware('auth.frontend')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/logout', [AccountController::class, 'customer_logout'])->name('customer.logout');
    // Route::get('/edit-profile', [IndexController::class, 'edit_profile'])->name('user.edit-profile');
    Route::get('/edit-profile', [IndexController::class, 'edit_personal_information'])->name('user.edit-profile');
    Route::get('/view-profile', [IndexController::class, 'view_personal_information'])->name('user.view-profile');
    Route::any('/update-account/{param}', [UserController::class, 'create_account'])->name('user.save-profile');

    Route::get('/posts', [IndexController::class, 'fetchPosts'])->name('posts.fetch');
    Route::post('/like-toggle', [IndexController::class, 'toggleLike'])->name('posts.like');

    Route::get('/posts/{postId}/comments', [IndexController::class, 'fetchComments'])->name('posts.comment.fetch');
    Route::post('/comments', [IndexController::class, 'storeComment'])->name('posts.comment.save');
    Route::delete('/comments/{id}', [IndexController::class, 'destroy'])->name('comments.destroy');

    Route::get('/posts/{post}/likes', [IndexController::class, 'getPostLikes']);
    Route::post('/toggle-save-post', [IndexController::class, 'toggleSavePost'])->name('toggle-save-post');
});

Route::middleware('guest')->group(function () {

    Route::get('auth/google', [SocialloginController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [SocialloginController::class, 'handleGoogleCallback']);

    Route::get('/registration', [AccountController::class, 'registration_page'])->name('registration');
    Route::any('/create-account/{param}', [AccountController::class, 'create_account'])->name('account.create');

    Route::get('/login', [AccountController::class, 'login'])->name('login');
    Route::post('/login', [AccountController::class, 'customer_login'])->name('customer.login');

    Route::any('/forgot-password/{param}', [AccountController::class, 'forgot_password'])->name('customer.forgot');
});


Route::get('/about-us', [IndexController::class, 'about_us'])->name('about-us');
Route::get('/help-center', [IndexController::class, 'help_center'])->name('help-center');

// not allocated route
Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('contact');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms', [IndexController::class, 'terms_page'])->name('terms');
Route::get('/sample-profile', [IndexController::class, 'sample_profile'])->name('sample_profile');
Route::get('/sample-profile-female', [IndexController::class, 'sample_profile_female'])->name('sample_profile_female');
Route::get('/personal-information', [IndexController::class, 'personal_information'])->name('personal_information');
Route::get('/notification', [IndexController::class, 'notification'])->name('notification');
Route::get('/messaging', [IndexController::class, 'messaging'])->name('messaging');
Route::get('/refund-policy', [IndexController::class, 'refund_policy'])->name('refund-policy');
// not allocated route


Route::get('/404', [IndexController::class, 'not_found'])->name('error_page');
Route::get('/thank-you', [IndexController::class, 'thank_you'])->name('thank_you');

Route::post('/contact-save', [IndexController::class, 'contact_save'])->name('contact.create');
Route::post('/comment-save', [IndexController::class, 'comment_save'])->name('comment.create');

Route::get('/search', [IndexController::class, 'search'])->name('search');
// Home END


Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

Route::get('/skills', [AccountController::class, 'getSkills'])->name('get.skills');
Route::get('/related-skills', [AccountController::class, 'getRelatedSkills'])->name('get.RelatedSkills');


Route::any('/get-previous-page', function () {
    $step = Session()->get('step');
    $step = $step - 1;
    Session()->put('step', $step);

    // return response()->json(['step' => $step]);
})->name('get-previous-page');


Route::get('/update-session', function () {
    Session()->put('temp_user_id', 2);
    Session()->put('step', 9);
})->name('update-session');


// Route::get('/admin', [IndexController::class, 'admin'])->name('admin');



//------------------------------ dummy controller ----------------------


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    //$exitCode = Artisan::call('route:cache');
    //$exitCode = Artisan::call('key:generate');
});

Route::get('/key-generate', function () {
    Artisan::call('key:generate', ['--show' => true]);
    return 'Application key generated successfully!';
});

Route::get('/create-storage-link', function () {
    $exitCode = Artisan::call('storage:link');

    if ($exitCode === 0) {
        return 'Storage link created successfully.';
    } else {
        return 'Error creating storage link.';
    }
});

