<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\EmailJobController;
use App\Http\Controllers\EmailLogController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RehearsalroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AvailablemusicianController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;

Route::resource('/', IndexController::class)->names([
    'index' => 'index.index',
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes(['logout' => false]);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('instruments', InstrumentController::class)->names([
        'index' => 'instruments.index',
    ]);

    Route::resource('genres', GenreController::class)->names([
        'index' => 'genres.index',
    ]);

    Route::resource('rehearsalrooms', RehearsalroomController::class)->names([
        'index' => 'rehearsalrooms.index',
    ]);

    Route::resource('users', UserController::class)->names([
        'index' => 'users.index',
    ]);

    Route::resource('acts', ActController::class)->names([
        'index' => 'acts.index',
    ]);

    Route::resource('vacancies', VacancyController::class)->names([
        'index' => 'vacancies.index',
    ]);

    Route::resource('venues', VenueController::class)->names([
        'index' => 'venues.index',
    ]);

    Route::resource('agencies', AgencyController::class)->names([
        'index' => 'agencies.index',
    ]);

    Route::resource('availablemusicians', AvailablemusicianController::class)->names([
        'index' => 'availablemusicians.index',
    ]);

    Route::resource('mailing', MailingController::class)->names([
        'index' => 'mailing.index',
    ]);

    Route::get('statistics/chart1', [StatisticController::class, 'chart1'])->name('statistics.chart1');
    Route::get('statistics/chart2', [StatisticController::class, 'chart2'])->name('statistics.chart2');
    Route::get('statistics/chart3', [StatisticController::class, 'chart3'])->name('statistics.chart3');
    Route::get('statistics/chart4', [StatisticController::class, 'chart4'])->name('statistics.chart4');
    Route::get('statistics/chart5', [StatisticController::class, 'chart5'])->name('statistics.chart5');

    Route::get('about/us', [AboutController::class, 'aboutus'])->name('about.us');
    Route::get('about/datausage', [AboutController::class, 'aboutdatausage'])->name('about.datausage');
    Route::get('about/acts', [AboutController::class, 'aboutacts'])->name('about.acts');
    Route::get('about/vacancies', [AboutController::class, 'aboutvacancies'])->name('about.vacancies');
    Route::get('about/availablemusicians', [AboutController::class, 'aboutavailablemusicians'])->name('about.availablemusicians');
    Route::get('about/rehearsalrooms', [AboutController::class, 'aboutrehearsalrooms'])->name('about.rehearsalrooms');
    Route::get('about/venues', [AboutController::class, 'aboutvenues'])->name('about.venues');
    Route::get('about/agencies', [AboutController::class, 'aboutagencies'])->name('about.agencies');
    Route::get('about/statistics', [AboutController::class, 'aboutstatistics'])->name('about.statistics');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('editpassword', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
    Route::post('updatepassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('userdata', [ProfileController::class, 'userdata'])->name('profile.userdata');

    Route::post('/password/reset', [ResetPasswordController::class, 'sendResetLink']);
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::resource('email-templates', EmailTemplateController::class);
    Route::resource('email-jobs', EmailJobController::class);
    Route::resource('email-logs', EmailLogController::class)->only([
        'index', 'show', 'destroy',
    ]);

});