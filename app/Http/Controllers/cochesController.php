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
            $search = request()->get("search", "");
            $query->where("marca", "like", "%" . $search . "%");
        }

        $coches = $query->get();
        return view("home", ["coches" => $coches]);
    }

    public function createCoche(Request $request)
    {
        $campos = $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string",
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
