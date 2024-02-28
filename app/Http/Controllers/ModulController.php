<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curId = $this->getUrlCurId();
        $cicleId = $this->getUrlCicleId();

        return view('modul/create_modul', ['cur_id' => $curId, 'cicle_id' => $cicleId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'cicle_id' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $modul = Modul::create($request->all());

        return redirect('/calendari/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
    }

    private function getUrl()
    {
        return "$_SERVER[REQUEST_URI]";
    }

    private function getUrlCurId()
    {
        $url = $this->getUrl();

        $urlValues = explode('/', $url);

        return $urlValues[2];
    }

    private function getUrlCicleId()
    {
        $url = $this->getUrl();

        $urlValues = explode('/', $url);

        return $urlValues[4];
    }
}
