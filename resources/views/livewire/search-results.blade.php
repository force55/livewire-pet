<div>
    <div class="mt-4 p-4 absolute border rounded-md bg-gray-700 border-indigo-600 max-h-96 overflow-scroll">

        @if(count($results) == 0)
            <div class="p-2">
                No results found
            </div>
        @endif

        @foreach($results as $result)
            <div class="p-2" wire:key="{{ $result->id }}">
                <a wire:navigate href="/articles/{{ $result->id }}">{{$result->title}}</a>
            </div>
        @endforeach
    </div>
</div>
