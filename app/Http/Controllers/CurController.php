<?php

namespace App\Http\Controllers;

use App\Models\Cur;
use Illuminate\Http\Request;

class CurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curssos = Cur::all();
        return view('veure_curssos', ['curssos' => $curssos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crear_curssos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curs = Cur::create($request->all());
        return redirect('veure_curssos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cur $cur)
    {
        return view('mostrar_curs', ['curs' => $cur]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cur $cur)
    {
        return view('editar_curs', ['curs' => $cur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cur $cur)
    {
        $cur->update($request->all());
        return redirect('veure_curssos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cur $cur)
    {
        $cur->delete();
        return redirect('veure_curssos');
    }
}
