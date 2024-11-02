<?php

    use App\Livewire\ArticleIndex;
    use App\Livewire\ArticleList;
    use App\Livewire\CreateArticle;
    use App\Livewire\Dashboard;
    use App\Livewire\EditArticle;
    use App\Livewire\ShowArticle;
    use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/articles/{article}',ShowArticle::class)->name('show-article');


Route::get('/dashboard',Dashboard::class)->name('dashboard');
Route::get('/dashboard/articles',ArticleList::class)->name('dashboard.articles');
Route::get('/dashboard/articles/create',CreateArticle::class)->name('dashboard.articles.create');
Route::get('/dashboard/articles/{article}/edit',EditArticle::class)->name('dashboard.articles.edit');
//Route::get('/search',Search::class)->name('search');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

