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

        return view('calendari/show_calendars', ['calendaris' => $calendari]);
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
        $ufsFirstModule = 0;

        foreach ($cicles as $cicle) {
            foreach ($cicle->moduls as $modul) {
                $obj = [
                    "nom" => $cicle->nom . ' - ' . $modul->nom,
                    "cicle_id" => $cicle->id,
                    "curs_id" => $cicle->cur_id,
                    "modul_id" => $modul->id,
                ];

                $cicleModul[$countMod] = $obj;
                $countMod = $countMod + 1;

                if ($modul->id == 1) {
                    $ufsFirstModule = count($modul->ufs);
                }

                foreach ($modul->ufs as $uf) {
                    $obj2 = [
                        "nom" => $modul->nom . ' - ' . $uf->nom,
                        "nomUf" => $uf->nom,
                        "dies" => $uf->dies,
                        "modul_id" => $modul->id,
                        "uf_id" => $uf->id,
                    ];

                    $modulUf[$countUf] = $obj2;
                    $countUf = $countUf + 1;
                }
            }
        }

        if ($ufsFirstModule == 0) {
            $ufsFirstModule = 1;
        }

        return view('calendari/create_calendari', ['curs' => $curs, 'cicleModuls' => $cicleModul, 'curs_id' => 1, 'modulUfs' => $modulUf, 'ufsFirstModule' => $ufsFirstModule]);
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
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $allUf = Uf::all();
        $cur_id = $request['curs'];
        $cicle_modul = explode('-', $request['cicle_modul']);
        $cicle_id = $cicle_modul[0];
        $modul_id = $cicle_modul[2];

        foreach ($request as $key => $value) {
            switch ($key) {
                case 'ufName1':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies1'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName2':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies2'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName3':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies3'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName4':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies4'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName5':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies5'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName6':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies6'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName7':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies7'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName8':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies8'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName9':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies9'], 'modul_id' => $modul_id]);
                    break;
                case 'ufName10':
                    Uf::create(['nom' => $value, 'dies' => $request['ufDies10'], 'modul_id' => $modul_id]);
                    break;
                default:
                    break;
            }
        }

        $calendari = Calendari::create(['cur_id' => $cur_id, 'cicle_id' => $cicle_id, 'modul_id' => $modul_id, 'dl_days' => $request['dl_days'], 'dm_days' => $request['dm_days'], 'dc_days' => $request['dc_days'], 'dj_days' => $request['dj_days'], 'dv_days' => $request['dv_days']]);

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
