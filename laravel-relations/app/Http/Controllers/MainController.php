<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Car;
use App\Pilot;

class MainController extends Controller
{
    public function index() {

        $brands = Brand::all();

        return view('pages.index', compact('brands'));
    }

    public function show($id) {

        $pilot = Pilot::findOrFail($id);

        return view('pages.show', compact('pilot'));
    }

    public function create() {

        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.create', compact('brands', 'pilots'));
    }
    public function store(Request $request) {

        $validate = $request -> validate([
            'name' => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'kw' => 'required|integer|min:10|max:2000',
        ]);

        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car = Car::make($validate);
        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilot_id'));
        $car -> save();

        return redirect() -> route('index');
    }
}
