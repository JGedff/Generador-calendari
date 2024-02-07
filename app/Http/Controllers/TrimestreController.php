<?php

namespace App\Http\Controllers;

use App\Models\Trimestre;
use Illuminate\Http\Request;

class TrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->getUrl();
        $urlValues = explode('/', $url);

        $curs = Project::find($urlValues[2]);

        return view('veure_trimestres', ['trimestres' => $curs->trimestres, 'actualurl' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crear_trimestre', ['cursid' => $this->getUrl()->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cur $curs)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'curs_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'ERROR';
        }

        $req = $request->all();
    
        array_push($req, 'curs_id');
    
        $req['curs_id'] = $curs->id;
        $trimestre = Trimestre::create($req);

        return redirect('/cur'.'/'.$trimestre->curs_id.'/trimestre');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cur $curs, Trimestre $trimestre)
    {
        return view('mostrar_trimestre', ['trimestre' => $trimestre, 'curs' => $curs->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cur $curs, Trimestre $trimestre)
    {
        return view('editar_trimestre', ['trimestre' => $trimestre, 'curs' => $curs->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trimestre $trimestre)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'curs_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'ERROR';
        }

        $trimestre->update($request->all());

        return redirect('/cur'.'/'.$request->id.'/trimestre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cur $curs, Trimestre $trimestre)
    {
        $trimestre->delete();

        return redirect('/cur'.'/'.$curs->id.'/trimestre');
    }

    private function getUrl()
    {
        return "$_SERVER[REQUEST_URI]";
    }
}
