<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadPokemonRequest;
use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            new PokemonCollection(Pokemon::all()),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadPokemonRequest $request, UploadFileService $uploadFileService)
    {
        $uploadFileService->uploadFile($request->file);

        return response()->json(
            new PokemonCollection(Pokemon::all()),
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
