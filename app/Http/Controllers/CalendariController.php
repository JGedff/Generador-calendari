<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Cur;
use App\Models\Cicle;
use App\Models\Uf;
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

                foreach ($modul->ufs as $uf) {
                    $obj2 = [
                        "nom" => $modul->nom . ' - ' . $uf->nom,
                        "modul_id" => $modul->id,
                        "uf_id" => $uf->id,
                    ];

                    $modulUf[$countUf] = $obj2;
                    $countUf = $countUf + 1;
                }
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
            'curs' => 'required',
            'cicle_modul' => 'required',
            'dl_days' => 'required',
            'dm_days' => 'required',
            'dc_days' => 'required',
            'dj_days' => 'required',
            'dv_days' => 'required',
            'ufName' => 'required',
            'ufDays' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $calendari = Calendari::create($request->all());

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
