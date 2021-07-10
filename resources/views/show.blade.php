@extends("layouts.app")
@section("title", $single["name"]." - Agregation")

@section("content")
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{Str::replaceFirst("thumb", "cover_big", $single["cover"]["url"]) }}" alt="Blackflag">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{$single["name"]}}</h2>
                <div class="text-gray-400">
                    <span>
                        @foreach($single["genres"] as $genre)
                            {{$genre["name"]}} @if(!$loop->last) &middot; @endif
                        @endforeach
                    </span>
                    &#124;
                    @if(isset($single["involved_companies"]))
                        <span>{{$single["involved_companies"][0]["company"]["name"]}}</span>
                        &#124;
                    @endif

                    <span>
                        @if(array_key_exists("platforms", $single))
                            @foreach($single["platforms"] as $key=>$platform)
                                @if(array_key_exists("abbreviation", $platform))
                                    {{ $platform["abbreviation"] }} @if(!$loop->last) &middot; @endif
                                @endif
                            @endforeach
                        @endif
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    @if(array_key_exists("rating", $single))
                    <div class="flex items-center">

                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    {{round($single["rating"])}}%
                                </div>
                            </div>

                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>
                    @endif
                    @if(array_key_exists("aggregated_rating", $single))
                        <div class="flex items-center ml-12">

                                <div class="w-16 h-16 bg-gray-800 rounded-full">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{round($single["aggregated_rating"])}}%
                                    </div>
                                </div>

                            <div class="ml-4 text-xs">Critic <br> Score</div>
                        </div>
                    @endif
                        <div class="flex items-center space-x-4 mt-6 lg:mt-0 lg:ml-12">

                        </div>

                    </div>
                <p class="mt-12">{{$single["summary"]}}</p>
                <div class="mt-12">
                    @if(array_key_exists("videos", $single))
                        <a href="https://www.youtube.com/watch/{{$single["videos"][0]["video_id"]}}" class="inline-block">
                            <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" width="24" height="24">
                                    <title>play--outline</title>
                                    <path d="M16,4A12,12,0,1,1,4,16,12,12,0,0,1,16,4m0-2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Z"/>
                                    <path d="M12,23a1,1,0,0,1-.51-.14A1,1,0,0,1,11,22V10a1,1,0,0,1,.49-.86,1,1,0,0,1,1,0l11,6a1,1,0,0,1,0,1.76l-11,6A1,1,0,0,1,12,23Zm1-11.32v8.64L20.91,16Z"/>
                                    <rect width="32" height="32" fill="none" data-name="&lt;Transparent Rectangle>"/>
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
            </div> <!-- End game details -->
        @if(array_key_exists("screenshots", $single))
            <div class="images-container border-b border-gray-800 pb-12 mt-8">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                    @foreach($single["screenshots"] as $screenshot)
                        <div>
                            <a href="{{Str::replaceFirst("thumb", "screenshot_huge", $screenshot["url"]) }}">
                                <img src="{{Str::replaceFirst("thumb", "screenshot_big", $screenshot["url"]) }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div> <!-- Images container -->
        @endif

        <div class="similar-games-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold py-6">Similar Games</h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
                @foreach($single["similar_games"] as $similar)
                    @if(array_key_exists("cover", $similar))
                        <x-game-card :game="$similar" />
                    @endif
                @endforeach
            </div>
        </div> <!-- End similar games container -->
    </div>
@endsection
