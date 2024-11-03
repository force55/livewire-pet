<?php

    namespace App\Livewire;

    use App\Livewire\Forms\ArticleForm;
    use App\Models\Article;
    use Livewire\Attributes\Title;
    use Livewire\WithFileUploads;

    #[Title('Edit Article')]
    class EditArticle extends AdminComponent
    {
        use WithFileUploads;

        public ?Article $article;

        public ArticleForm $form;

        public function mount(Article $article)
        {
            $this->form->setArticle($article);
        }

        public function save()
        {
            $this->form->update();

            session()->flash('status', 'Article updated successfully!');

            $this->redirect(ArticleList::class, navigate: true);
        }

        public function render()
        {
            return view('livewire.edit-article');
        }
    }
