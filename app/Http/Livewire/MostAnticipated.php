<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnti = [];
    public function loadMostAnticipated(){
        $before = Carbon::now()->subMonth(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $this->mostAnti = Http::withHeaders(config("services.igdb"))
            ->withBody("
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, slug, rating, summary, rating_count;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$before}
                    & first_release_date < {$afterFourMonths}
                    & cover.url != null);
                    sort total_rating_count desc;
                    limit 5;
                ", 'text/plain'
            )->post("https://api.igdb.com/v4/games/")
            ->json();
//        dump($this->mostAnti);
    }
    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
