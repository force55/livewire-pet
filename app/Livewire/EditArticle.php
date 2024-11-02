<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Article')]
class EditArticle extends AdminComponent
{
    public ?Article $article;

    public ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function save()
    {
        $this->form->update();

        $this->redirect(route('dashboard.articles'),navigate:true);
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
