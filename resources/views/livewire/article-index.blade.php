<div class="m-auto w-1/2">
    <div wire:offline>
        <div class="bg-red-500 text-white p-3">
            You are offline.
        </div>
    </div>
    @foreach($articles as $article)
        <div class="mt-3 p-3" wire:key="{{ $article->id }}">

            <h3 class="text-2xl text-blue-500 mb-3 hover:text-blue-700"
                wire:offline.class.remove="text-blue-500 hover:text-blue-700"
            >
                <a wire:navigate href="/articles/{{ $article->id }}">{{ $article->title }}</a>
            </h3>

            <p>
                {{ str($article->content)->words(30) }}
            </p>
        </div>

    @endforeach
</div>
