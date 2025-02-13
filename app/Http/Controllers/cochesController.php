<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;
class cochesController extends Controller
{
    public function home()
    {
        $query = Coche::query();
        if (request()->has("search")) {
            $search = request()->get("search");
            $query->search($search);
        }
        $query->filter();
        $coches = $query->get();
        return view("home", ["coches" => $coches]);
    }

    public function createCoche(Request $request)
    {
        $campos = $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string",
            "anio" => "required|string",
            "precio" => "required|string",
            "color" => "required|string",
        ]);
        Coche::create($campos);
        return redirect("/");
    }

    public function showEditCoche(Coche $coche)
    {
        return view("edit-coche", ["coche" => $coche]);
    }

    public function EditCoche(Request $request, Coche $coche)
    {
        $campos = $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string",
            "color" => "required|string",
            "año" => "required|integer",
            "precio" => "required|float",
        ]);
        $coche->update($campos);
        return redirect("/");
    }

    public function deleteCoche(Coche $coche)
    {
        $coche->delete();
        return redirect("/");
    }
}
