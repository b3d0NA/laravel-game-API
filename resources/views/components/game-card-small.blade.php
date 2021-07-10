<div class="game flex">
    <a href="{{ route("game.show", $most["slug"]) }}">
        <img src="{{$most["cover"]["url"]}}" alt="Game Cover" class="hover:opacity-75 object-fill w-16 rounded-md transition ease-in-out duration-150">
    </a>
    <div class="ml-4">
        <a href="{{ route("game.show", $most["slug"]) }}" class="hover:text-gray-300">{{$most["name"]}}</a>
        <div class="text-gray-400 mt-2">{{ Carbon\Carbon::parse($most["first_release_date"])->format("M d, Y")}}</div>
    </div>
</div>
