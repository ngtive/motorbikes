<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Color;
use Illuminate\Http\Request;

class BikeController extends Controller {

    public function __construct() {
        $this->middleware('auth:web')->only(['update', 'destroy', 'create', 'store', 'edit']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $bikes = Bike::query();

        if ($request->has('sort')) {
            $request->validate(['sort' => 'required|string|in:price,created', 'direction' => 'required|string|in:asc,desc']);
            $sortKey = $request->sort;
            $sortDirection = $request->direction;

            match ($sortKey) {
                'price' => $bikes->orderBy('price', $sortDirection),
                'created' => $bikes->orderBy('created_at', $sortDirection),
            };
        }

        if ($request->has('colors')) {
            $request->validate(['colors.*' => 'required|string|exists:App\Models\Color,color_name']);
            $bikes->whereHas('color', fn($query) => $query->whereIn('color_name', $request->colors));
        }

        $bikes = $bikes->paginate(4)->withQueryString();
        $colors = Color::select('color_name')->groupBy('color_name')->get()->map->color_name;

        $requestedColors = $request->colors;
        $requestedSort = $request->sort;

        return view('bikes', compact('bikes', 'colors', 'requestedColors', 'requestedSort'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:50',
            'color_id' => 'required|numeric|exists:App\Models\Color,id',
            'image' => 'required|file|mimes:jpg,png,webp,jpeg,svg',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $filePath = $request->file('image')->storePublicly('motorbikes/images');
        $validated['image'] = $filePath ?? null;
        $bike = Bike::create($validated);

        return redirect()->route('bikes.edit', ['bike' => $bike]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $colors = Color::all();
        return view('admin.create-bike', compact('colors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike) {
        return view('show-bike', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike) {
        $colors = Color::all();
        return view('admin.edit-bike', compact('bike', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike) {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:50',
            'color_id' => 'required|numeric|exists:App\Models\Color,id',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'file|mimes:jpg,png,webp,jpeg,svg'
            ]);
            $validated['image'] = $request->file('image')->storePublicly('motorbikes/images');
        }

        if (isset($validated['image'])) {
            $bike->image = $validated['image'];
        }
        $bike->name = $validated['name'];
        $bike->color_id = $validated['color_id'];
        $bike->price = $validated['price'];
        $bike->weight = $validated['weight'];
        $bike->saveOrFail();

        return redirect()->route('bikes.edit', ['bike' => $bike]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike) {
        $bike->deleteOrFail();
        return redirect()->route('home');
    }
}
