<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Cur;
use App\Models\Cicle;
use App\Models\Festiu;
use App\Models\Calendari;
use App\Models\Trimestre;
use Illuminate\Http\Request;
use App\Exports\calendariExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class CalendariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendari = Calendari::All();

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curs = Cur::All();
        $cicles = Cicle::All();
        $cicleModul = array();
        $modulUf = array();
        $countMod = 0;
        $countUf = 0;

        foreach ($cicles as $cicle) {
            foreach ($cicle->moduls as $modul) {
                $obj = [
                    "nom" => $cicle->nom . ' - ' . $modul->nom,
                    "cicle_id" => $cicle->id,
                    "curs_id" => $cicle->cur_id,
                ];

                $cicleModul[$countMod] = $obj;
                $countMod = $countMod + 1;
            }
        }

        return view('calendari/create_calendari', ['curs' => $curs, 'cicleModuls' => $cicleModul, 'curs_id' => 1, 'modulUfs' => $modulUf]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'calendari_nom' => 'required',
            'cur_nom' => 'required',
            'trimestre_nom' => 'required',
            'festiu_nom' => 'required',
            'cur_data_inici' => 'required',
            'cur_data_final' => 'required',
            'festiu_data_inici' => 'required',
            'festiu_data_final' => 'required',
            'trimestre_data_inici' => 'required',
            'trimestre_data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $reqCur = ['nom' => $request->cur_nom, 'data_inici' => $request->cur_data_inici, 'data_final' => $request->cur_data_final];
        $reqFestiu = ['nom' => $request->festiu_nom, 'data_inici' => $request->festiu_data_inici, 'data_final' => $request->festiu_data_final, 'cur_id' => ''];
        $reqTrimestre = ['nom' => $request->trimestre_nom, 'data_inici' => $request->trimestre_data_inici, 'data_final' => $request->trimestre_data_final, 'cur_id' => ''];

        $data_inici = new DateTime($reqFestiu['data_inici']);
        $data_final = new DateTime($reqFestiu['data_final']);

        array_push($reqFestiu, 'vacances');

        if (intval($data_inici->diff($data_final)->format('%a')) > 0) {
            $reqFestiu['vacances'] = true;
        } else {
            $reqFestiu['vacances'] = false;
        }

        $curs = Cur::create($reqCur);
        $reqTrimestre['cur_id'] = $curs->id;
        $reqFestiu['cur_id'] = $curs->id;
        $trimestre = Trimestre::create($reqTrimestre);
        $festiu = Festiu::create($reqFestiu);

        $reqCalendari = ['nom' => $request->calendari_nom, 'cur_id' => $curs->id];

        $calendari = Calendari::create($reqCalendari);

        return redirect('/calendari');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendari $calendari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendari $calendari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendari $calendari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendari $calendari)
    {
        //
    }

    public function exportCalendari(){
        return Excel::download(new calendariExport, 'calendari.xlsx');
    }
}
