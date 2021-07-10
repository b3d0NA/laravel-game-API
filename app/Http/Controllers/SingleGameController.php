<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SingleGameController extends Controller
{
    //Index view
    function index($slug){
        $singleGames = Http::withHeaders(config("services.igdb"))
            ->withBody("
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;
                    where slug = \"{$slug}\";
                ", 'text/plain'
            )->post("https://api.igdb.com/v4/games/")
            ->json();
        return view("show", [
            "single" => $singleGames[0],
        ]);

    }
}
