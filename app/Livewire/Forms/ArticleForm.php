<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleForm extends Form
{
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $content;

    public $notification = 'none';
    public $published = false;

    public $article;

    public function setArticle(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notification = $article->notification;

        $this->article = $article;
    }

    public function store()
    {
        $this->validate();

        Article::create($this->only('title', 'content','notification','published'));
    }

    public function update()
    {
        $this->validate();

        $this->article->update($this->only('title', 'content','notification','published'));
    }
}
