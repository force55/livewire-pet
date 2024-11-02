<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    public function render()
    {
        return view('livewire.article-list', [
            'articles' => Article::latest()->get()
        ]);
    }

    public function delete(Article $article)
    {
        $article->delete();
    }

}
