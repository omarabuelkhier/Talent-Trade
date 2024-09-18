<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CandidateTechnologyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    if (!Auth::check()) {
        return to_route('login');
    }
    abort('404');
});
Route::get('/test', function () {return view('test');});
Auth::routes();
Route::prefix('Dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {return view('dashboard');})->name("Dashboard")->middleware('is_admin');
    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::get('/users-archive', [UserController::class, 'archive'])->name('users.archive');
    Route::get('/users-restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::resource('skills', TechnologyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('candidate', CandidateController::class);
    Route::resource('candidate-technology', CandidateTechnologyController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('jobPosts', JobPostController::class);
    Route::resource('application', ApplicationController::class);
    Route::get('/pending-posts', [JobPostController::class, 'pending_post'])->name('pending_posts');
    Route::put('/reject-pending-status/{jobPost}', [JobPostController::class, 'reject_status'])->name('reject_status');
    Route::put('/approved-pending-status/{jobPost}', [JobPostController::class, 'approved_status'])->name('approved_status');
    Route::put('/application-reject/{application}', [ApplicationController::class, 'reject'])->name('application.reject');
});
Route::get('/dashboard-role', function () {return view('auth/dashboard-role');})->name('dashboard_role')->middleware(['auth','Create_Without_Role']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $githubUser = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
        'password' => $githubUser->token,
        'image' => $githubUser->avatar,
    ]);
    Auth::login($githubUser);
    if (Auth::user()->role === null) {
        return redirect('/dashboard-role');
    } else {
        return to_route('jobPosts.index');
    }

    // $user->token
});

Route::get('/search', [JobPostController::class, 'search'])->name('search');
