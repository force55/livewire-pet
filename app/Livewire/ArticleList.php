<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use withPagination;

    #[Session(key: 'published')]
    public $showOnlyPublished = false;
    public function render()
    {
        return view('livewire.article-list', [
            'articles' => $this->articles
        ]);
    }

    #[Computed]
    public function articles()
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', true);
        }

        return $query->latest()->paginate(10,pageName: 'articles-page');
    }

    public function togglePublished($showOnlyPublished)
    {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage(pageName: 'articles-page');
    }

    /**
     * @throws \Exception
     */
    public function delete(Article $article)
    {
//        if ($this->articles->count() < 10){
//            throw new \Exception('You cannot delete the last article on the page.');
//        }

        $article->delete();
        cache()->forget('published-count');
//        unset($this->articles);
    }

}
