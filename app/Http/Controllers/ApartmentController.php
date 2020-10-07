<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Http\Resources\ApartmentResources;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(Request $request)
    {
        $models = Apartment::filter(array_merge($request->filters ?? [], ['sort' => $request->sort]))
            ->paginate();

        return new ApartmentResources($models);
    }

    public function show(Apartment $apartment)
    {
        return new ApartmentResource($apartment);
    }
}
