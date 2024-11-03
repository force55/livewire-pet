<div class="m-auto w-1/2 mb-4">

    <div class="mb-3 flex justify-between items-center">
        <a
            wire:navigate
            href="{{ route('dashboard.articles.create') }}"
            class="text-gray-200 p-2 bg-indigo-500 hover:bg-indigo-600 rounded-sm"
        >
            Create Article
        </a>
        <livewire:published-count />
    </div>


    <table>
        <thead class="text-xs uppercase br-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
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
