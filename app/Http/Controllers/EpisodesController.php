<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;

class EpisodesController extends Controller
{
    public function index(Season $season){
        $episodes = $season->episodes()->get();
        return view("episodes.index")->with('episodes', $episodes );
    }
}
