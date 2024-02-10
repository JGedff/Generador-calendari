<?php

namespace App\Http\Controllers;

use App\Models\Trimestre;
use App\Models\Cur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->getUrl();
        $curs = $this->getCurUrl($url);

        return view('trimestres/show_trimestre', ['trimestres' => $curs->trimestres, 'actualurl' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = $this->getUrl();
        $curs = $this->getCurUrl($url);

        return view('trimestres/create_trimestre', ['cursid' => $curs->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cur $curs)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'cur_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $trimestre = Trimestre::create($request->all());

        return redirect('/cur'.'/'.$trimestre->cur_id.'/trimestre');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $strCurs, String $strTrimestre)
    {
        $trimestre = Trimestre::find($strTrimestre);
        
        return view('trimestres/see_trimestre', ['trimestre' => $trimestre, 'cursid' => $strCurs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $strCurs, String $strTrimestre)
    {
        $trimestre = Trimestre::find($strTrimestre);

        return view('trimestres/update_trimestre', ['trimestre' => $trimestre, 'cursid' => $strCurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $strCurs, String $strTrimestre)
    {
        $trimestre = Trimestre::find($strTrimestre);
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'cur_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $trimestre->update($request->all());

        return redirect('/cur'.'/'.$strCurs.'/trimestre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $strCurs, String $strTrimestre)
    {
        $trimestre = Trimestre::find($strTrimestre);
        $trimestre->delete();

        return redirect('/cur'.'/'.$strCurs.'/trimestre');
    }

    private function getUrl()
    {
        return "$_SERVER[REQUEST_URI]";
    }

    private function getCurUrl(String $url)
    {
        $urlValues = explode('/', $url);
        
        return Cur::find($urlValues[2]);
    }
}
