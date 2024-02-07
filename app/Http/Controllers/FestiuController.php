<?php

namespace App\Http\Controllers;

use App\Models\Festiu;
use Illuminate\Http\Request;

class FestiuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->getUrl();
        $urlValues = explode('/', $url);

        $curs = Project::find($urlValues[2]);

        return view('veure_festius', ['festius' => $curs->festius, 'actualurl' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crear_festiu', ['cursid' => $this->getUrl()->id]);
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
            'data_final' => 'required',
            'vacances' => 'required'
        ]);

        if ($validate->fails()) {
            return 'ERROR';
        }

        $req = $request->all();
    
        array_push($req, 'curs_id');
    
        $req['curs_id'] = $curs->id;
        $festiu = Festiu::create($req);

        return redirect('/curs'.'/'.$festiu->curs_id.'/festius');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cur $curs, Festiu $festiu)
    {
        return view('mostrar_festiu', ['festiu' => $festiu, 'curs' => $curs->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Cur $curs, Festiu $festiu)
    {
        return view('editar_festiu', ['festiu' => $festiu, 'curs' => $curs->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cur $curs, Festiu $festiu)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'curs_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required',
            'vacances' => 'required'
        ]);

        if ($validate->fails()) {
            return 'ERROR';
        }

        $task->update($request->all());

        return redirect('/curs'.'/'.$curs->id.'/festius');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cur $curs, Festiu $festiu)
    {
        $festiu->delete();

        return redirect('/curs'.'/'.$curs->id.'/festius');
    }

    private function getUrl()
    {
        return "$_SERVER[REQUEST_URI]";
    }
}
