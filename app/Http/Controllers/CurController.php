<?php

namespace App\Http\Controllers;

use App\Models\Cur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurController extends Controller
{
    public function index()
    {
        $curs = Cur::All();

        return view('curs/see_cur', ['curs' => $curs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curs/create_cur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $curs = Cur::create($request->all());

        return redirect('/cur');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $strCurs)
    {
        $curs = Cur::find($strCurs);

        return view('curs/show_cur', ['cur' => $curs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $strCurs)
    {
        $curs = Cur::find($strCurs);
        
        return view('curs/update_cur', ['cur' => $curs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $strCurs)
    {
        $curs = Cur::find($strCurs);
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required'
        ]);

        if ($validate->fails()) {
            return 'Not all fields were mentioned';
        }

        $curs->update($request->all());

        return redirect('/cur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $strCurs)
    {
        $curs = Cur::find($strCurs);
        $curs->delete();

        return redirect('/cur');
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
