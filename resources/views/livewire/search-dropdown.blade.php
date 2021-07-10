<div class="flex items-center" x-data="{ isVisible: true }" @click.away="isVisible=false">
    <div class="relative">
        <input
            wire:model.debounce.300ms="search"
            type="text"
            class="bg-gray-800 text-sm rounded-full w-64 px-3 py-1 pl-8 focus:outline-none focus:shadow-outline"
            placeholder="Search..."
            @focus="isVisible = true"
            @keydown.escape.window = "isVisible = false"
            @keydown = "isVisible = true"
            @keydown.shift.tab = "isVisible = false"
        >
        <div class="absolute top-0 flex items-center h-full ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-current text-gray-400 w-4">
                <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/>
            </svg>
        </div>
        <svg wire:loading class="animate-spin absolute top-1 right-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ffffff" width="18" height="18">
            <path d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z"/>
        </svg>
        @if(strlen($search) >= 2)
            <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show="isVisible">
                @if(count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $game)
                        @if(array_key_exists("cover", $game))
                            <li class="border-b border-gray-700">
                                <a href="{{ route("game.show", $game["slug"]) }}"
                                   @if($loop->last) @keydown.tab = "isVisible=false" @endif
                                   class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3">
                                    <img src="{{ $game["cover"]["url"] }}" alt="Ganja" class="w-10">
                                    <span class="ml-4">{{ $game["name"]}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @else
                    <div class="text-center text-white p-3">No result found for "{{$search}}"</div>
                @endif
            </div>
        @endif
    </div>
</div>
