<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return $movies;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_de_estreno' => 'required|string',
            'portada' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $movie = new Movie();
        $movie->titulo = $request->titulo;
        $movie->descripcion = $request->descripcion;
        $movie->fecha_de_estreno = $request->fecha_de_estreno;
        $movie->portada = $request->portada;

        $movie->save();
        return $movie;
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return $movie;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_de_estreno' => 'required|string',
            'portada' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $movie = Movie::findOrFail($request->id);
        $movie->titulo = $request->titulo;
        $movie->descripcion = $request->descripcion;
        $movie->fecha_de_estreno = $request->fecha_de_estreno;
        $movie->portada = $request->portada;
        $movie->save();
        return $movie;
    }

    public function destroy($id)
    {
        $movie = Movie::findORFail($id);
        $movie->delete();
        return $movie;
    }
}