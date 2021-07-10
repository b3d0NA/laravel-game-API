<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];
    public function loadComingSoon(){
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Http::withHeaders(config("services.igdb"))
            ->withBody("
                    fields name, cover.url, first_release_date, total_rating_count, rating, slug, rating_count;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$current}
                    & rating > 50);
                    sort first_release_date asc;
                    limit 5;
                ", 'text/plain'
            )->post("https://api.igdb.com/v4/games/")
            ->json();
    }
    public function render()
    {
        return view('livewire.coming-soon');
    }
}
