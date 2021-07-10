<div wire:init="loadComingSoon" class="coming-soon-container space-y-10 mt-8">
    @forelse($comingSoon as $soon)
        @if(array_key_exists("cover", $soon))
            <x-game-card-small :most="$soon" />
        @endif
    @empty
        <x-game-card-small-skeleton />
    @endforelse
</div>
