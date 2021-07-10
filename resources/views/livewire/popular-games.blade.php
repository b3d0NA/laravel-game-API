<div wire:init="loadPopularGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse($popularGames as $game)
        @if(array_key_exists("cover", $game))
            <x-game-card :game="$game" />
        @endif
    @empty
        @foreach(range(1, 12) as $skeleton)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-48 h-56 animate-pulse"></div>
                </div>
                <div class="block animate-pulse text-transparent text-lg bg-gray-700 rounded leading-tight mt-4">Game name</div>
                <div class="text-transparent animate-pulse bg-gray-700 rounded mt-3 inline-block">Ps4, Pc, Switch</div>
            </div>
        @endforeach
    @endforelse
</div>{{-- end popular games--}}
