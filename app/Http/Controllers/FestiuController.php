<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Festiu;
use App\Models\Cur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FestiuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->getUrl();
        $curs = $this->getCurUrl($url);

        return view('festius/see_festiu', ['festius' => $curs->festius, 'actualurl' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = $this->getUrl();
        $curs = $this->getCurUrl($url);

        return view('festius/create_festiu', ['cursid' => $curs->id]);
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

        $req = $request->all();
        $data_inici = new DateTime($req['data_inici']);
        $data_final = new DateTime($req['data_final']);

        array_push($req, 'vacances');

        if (intval($data_inici->diff($data_final)->format('%a')) > 0) {
            $req['vacances'] = true;
        } else {
            $req['vacances'] = false;
        }

        $festiu = Festiu::create($req);

        return redirect('/cur'.'/'.$festiu->cur_id.'/festiu');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $strCurs, String $strFestiu)
    {
        $festiu = Festiu::find($strFestiu);
        return view('festius/show_festiu', ['festiu' => $festiu, 'cursid' => $strCurs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $strCurs, String $strFestiu)
    {
        $festiu = Festiu::find($strFestiu);
        return view('festius/update_festiu', ['festiu' => $festiu, 'cursid' => $strCurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $strCurs, String $strFestiu)
    {
        $festiu = Festiu::find($strFestiu);
        $curs = Cur::find($strCurs);
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'cur_id' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }
        
        $req = $request->all();
        $data_inici = new DateTime($req['data_inici']);
        $data_final = new DateTime($req['data_final']);

        array_push($req, 'vacances');

        if (intval($data_inici->diff($data_final)->format('%a')) > 0) {
            $req['vacances'] = true;
        } else {
            $req['vacances'] = false;
        }

        $festiu->update($req);


        return redirect('/cur'.'/'.$curs->id.'/festiu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $strCurs, String $strFestiu)
    {
        $festiu = Festiu::find($strFestiu);
        $curs = Cur::find($strCurs);
        $festiu->delete();

        return redirect('/cur'.'/'.$curs->id.'/festiu');
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
