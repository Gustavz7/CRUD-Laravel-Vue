<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thought;
use App\Models\User;

class ThoughtController extends Controller
{

    public function index()
    {
        //devolver el listado de pensamientos del usuario logueado
        return Thought::all();
    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //crearemos y guardaremos el pensamiento
        $thought = new Thought();
        $thought ->description = $request->description;
        $thought ->user_id = auth()->id();
        $thought ->save();

        return $thought;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        $thought = Thought::find($id);
        $thought ->description = $request->description;
        $thought ->save();

        return $thought;
    }

    public function destroy($id)
    {
        //
       Thought::destroy($id);

    }
}
