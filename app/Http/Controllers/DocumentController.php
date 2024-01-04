<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocione;
use App\Models\Afile;
use App\Models\Amparo;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function details($id)
    {
       $promociones=Promocione::find($id);
       //$acciones=Seguimiento::where('documentos_id',$id)->get();
       //dd($document->archivos);
       return view('docs.details', compact('promociones'));
    }
    public function details_amparos($id)
    {
       $amparos=Amparo::find($id);
       //$acciones=Seguimiento::where('documentos_id',$id)->get();
       //dd($document->archivos);
       return view('docs.amparos', compact('amparos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
