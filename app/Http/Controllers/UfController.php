<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UfController extends Controller
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
        $modulId = $this->getUrlModulId();

        return view('uf/create_uf', ['modul' => $modulId, 'cicle' => $cicleId, 'cur' => $curId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'dies' => 'required',
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $curs = Uf::create($request->all());

        return redirect('/calendari/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uf $uf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uf $uf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uf $uf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uf $uf)
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

        private function getUrlModulId()
    {
        $url = $this->getUrl();

        $urlValues = explode('/', $url);

        return $urlValues[6];
    }
}
