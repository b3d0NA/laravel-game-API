<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    //Game popularity
    function index(){
        $before = Carbon::now()->subMonth(2)->timestamp;
        $after = Carbon::now()->addMonth(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

//        $popularGames = Http::withHeaders(config("services.igdb"))
//            ->withBody("
//                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
//                    where platforms = (48,49,130,6)
//                    & (first_release_date >= {$before}
//                    & first_release_date < {$after});
//                    sort total_rating_count desc;
//                    limit 15;
//                ", 'text/plain'
//            )->post("https://api.igdb.com/v4/games/")
//            ->json();
//        dump($popularGames);
//        $recenltyReviewed = Http::withHeaders(config("services.igdb"))
//            ->withBody("
//                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, summary, rating_count;
//                    where platforms = (48,49,130,6)
//                    & (first_release_date >= {$before}
//                    & first_release_date < {$current}
//                    & rating_count > 5);
//                    sort total_rating_count desc;
//                    limit 5;
//                ", 'text/plain'
//            )->post("https://api.igdb.com/v4/games/")
//            ->json();

//        $mostAnticipated = Http::withHeaders(config("services.igdb"))
//            ->withBody("
//                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, summary, rating_count;
//                    where platforms = (48,49,130,6)
//                    & (first_release_date >= {$before}
//                    & first_release_date < {$afterFourMonths});
//                    sort total_rating_count desc;
//                    limit 5;
//                ", 'text/plain'
//            )->post("https://api.igdb.com/v4/games/")
//            ->json();

//        $comingSoon = Http::withHeaders(config("services.igdb"))
//            ->withBody("
//                    fields name, cover.url, first_release_date, total_rating_count, rating, rating_count;
//                    where platforms = (48,49,130,6)
//                    & (first_release_date >= {$current}
//                    & rating > 50);
//                    sort first_release_date asc;
//                    limit 5;
//                ", 'text/plain'
//            )->post("https://api.igdb.com/v4/games/")
//            ->json();
        return view("index", [
//            "popularGames" => $popularGames,
//            "recentReview" => $recenltyReviewed,
//            "mostAnti" => $mostAnticipated,
//            "comingSoon" => $comingSoon
        ]);
    }
}
