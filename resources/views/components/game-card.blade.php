<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{route("game.show", $game["slug"])}}">
            <img src="{{ Str::replaceFirst("thumb", "cover_big", $game["cover"]["url"]) }}" alt="Game Cover" class="hover:opacity-75 rounded-md transition ease-in-out duration-150">
        </a>
        @if(isset($game["rating"]))
            <div class="absolute -bottom-5 -right-5 w-12 h-12 lg:w-16 lg:h-16 bg-gray-800 rounded-full" >
                <div class="font-semibold text-sm lg:text-xs flex justify-center items-center h-full"> {{round($game["rating"])}}%</div>
            </div>
        @endif
    </div>
    <a href="{{route("game.show", $game["slug"])}}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game["name"]}}</a>
    <div class="text-gray-400 mt-1">
        @if(array_key_exists("platforms", $game))
            @foreach($game["platforms"] as $key=>$platform)
                @if(array_key_exists("abbreviation", $platform))
                    @if(!$key <= 0) • @endif {{ $platform["abbreviation"] }}
                @endif
            @endforeach
        @endif
    </div>
</div>
