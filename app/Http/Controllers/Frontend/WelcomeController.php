<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Cache::remember('todays_specials', 86400, function () {
            return Menu::inRandomOrder()->limit(3)->get();
        });
        
        return view('index', compact('specials'));
    }
    public function thankYou()
    {
        return view('thankyou');
    }
}
