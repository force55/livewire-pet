<?php

    namespace App\Livewire;

    use App\Models\Article;
    use Livewire\Attributes\Isolate;
    use Livewire\Attributes\On;
    use Livewire\Attributes\Url;
    use Livewire\Component;

    #[Isolate]
    class Search extends Component
    {
        #[Url(as: 'q', history: false, except: '')]
        public $searchText = '';
        public $placeholder;

        #[On('search:clear-results')]
        public function clear()
        {
            $this->reset('searchText');
        }

        public function render()
        {
            return view('livewire.search',[
                'results' => Article::where('title','like',"%{$this->searchText}%")->get()
            ]);
        }
    }
