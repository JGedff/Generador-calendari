<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CicleController extends Controller
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

        return view('cicle/create_cicle', ['curId' => $curId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'cur_id' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $cicle = Cicle::create($request->all());

        return redirect('/calendari/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cicle $cicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cicle $cicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cicle $cicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cicle $cicle)
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
}
