<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function home()
    {
        $places = Place::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        return view('home', compact('places'));
    }

    public function index()
    {
        $places = Place::where('status', 1)->get();
        return view('places.index', compact('places'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $places = Place::where('status', 1)->where('name', 'LIKE', "%{$keyword}%")->get();
        return view('places.index', compact('places', 'keyword'));
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('places.show', compact('place'));
    }
}
