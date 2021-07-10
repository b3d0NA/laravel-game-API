<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentReview as $recent)
        @if(array_key_exists("cover", $recent))
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <a href="{{route("game.show", $recent["slug"])}}">
                        <img src="{{Str::replaceFirst("thumb", "cover_big", $recent["cover"]["url"]) }}" alt="Game Cover" class="hover:opacity-75 w-48 rounded-md transition ease-in-out duration-150">
                    </a>
                    @if(isset($recent["rating"]))
                        <div class="absolute bottom-0 right-1/2 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom: -20px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{round($recent["rating"])}}%</div>
                        </div>
                    @endif
                </div>
                <div class="ml-6 lg:ml-12">
                    <a href="{{route("game.show", $recent["slug"])}}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{$recent["name"]}}</a>
                    <div class="text-gray-600 mt-1">
                        @foreach($recent["platforms"] as $key=>$platform)
                            @if(array_key_exists("abbreviation", $platform))
                                @if(!$key <= 0) • @endif {{ $platform["abbreviation"] }}
                            @endif
                        @endforeach
                    </div>
                    <p class="mt-6 text-gray-400 hidden lg:block">
                        {{$recent["summary"]}}
                    </p>
                </div>
            </div>
        @endif
    @empty
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <div class="bg-gray-700 w-32 lg:w-48 h-50 lg:h-56 animate-pulse"></div>
            </div>
            <div class="ml-6 lg:ml-12">
                <div class="inline-block animate-pulse text-lg font-semibold leading-tight text-transparent bg-gray-700 rounded mt-4">Title goes here</div>
                <div class="mt-8 space-y-4 hidden lg:block animate-pulse">
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                </div>
            </div>
        </div>
    @endforelse
</div>
