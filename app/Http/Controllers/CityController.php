<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index($slug = null) 
    {
        if ($slug) {
            $city = City::where('slug', $slug)->firstOrFail();
            session(['selected_city' => $city]);
            return view('index', ['cities' => City::all(), 'selectedCity' => $city]);
        }

        if (session('selected_city')) {
            return redirect()->route('city.index', ['slug' => session('selected_city.slug')]);
        }

        return view('index', ['cities' => City::all(), 'selectedCity' => null]);
    }

    public function about()
    {
        $city = session('selected_city');

        if (!$city) {
            return redirect()->route('index');
        }

        return view('city.about', ['city' => $city]);
    }

    public function news()
    {
        $city = session('selected_city');

        if (!$city) {
            return redirect()->route('index');
        }
        
        return view('city.news', ['city' => $city]);
    }

}
