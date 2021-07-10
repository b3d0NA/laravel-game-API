<div wire:init="loadMostAnticipated" class="most-reviewed-container space-y-10 mt-8">
    @forelse($mostAnti as $most)
        @if(array_key_exists("cover", $most))
            <x-game-card-small :most="$most" />
        @endif
    @empty
        <x-game-card-small-skeleton />
    @endforelse
</div>
