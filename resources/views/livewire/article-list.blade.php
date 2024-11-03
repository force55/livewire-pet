<div class="m-auto w-2/3 mb-4">

    <div class="mb-3 flex justify-between items-center">
        <a
            wire:navigate
            href="{{ route('dashboard.articles.create') }}"
            class="text-blue-500 hover:text-blue-700"
        >
            Create Article
        </a>

        <div>
            <button @class([
                        'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                        'bg-gray-700' => $showOnlyPublished,
                        'bg-blue-700' => !$showOnlyPublished,

                    ])
                    wire:click="togglePublished(false)"
            >
                Show All
            </button>


            <button @class([
                        'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                        'bg-blue-700' => $showOnlyPublished,
                        'bg-gray-700' => !$showOnlyPublished,

                    ])
                    wire:click="togglePublished(true)"
            >
                Show published (
                <livewire:published-count placeholder-text="Loading..."/>
                )
            </button>


        </div>

    </div>

    @if(session('status'))
        <div class="bg-green-700 text-white p-3 mb-3 text-center">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-3">
        {{ $this->articles->links() }}
    </div>


    <table class="w-full">
        <thead class="text-xs uppercase br-gray-700 text-gray-400">
        <tr>
            <th class="px-6 py-3">Title</th>
            <th class="px-6 py-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->articles as $article)
            <tr class="border-b border-gray-700 bg-gray-800" wire:key="{{ $article->id }}">
                <td class="px-6 py-3">{{ $article->title }}</td>
                <td class="px-6 py-3">
                    <a
                        class="text-gray-200 p-2"
                        wire:navigate
                        href="{{ route('dashboard.articles.edit', $article->id) }}"
                    >
                        Edit
                    </a>

                    <button
                        class="text-gray-200 p-2 bg-red-700 hover:bg-red-500 rounded-sm"
                        wire:click="delete({{ $article->id }})"
                        wire:confirm="Are you sure you want to delete this article?"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
