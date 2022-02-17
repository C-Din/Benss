<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeRdv;
use Flashy;

class TypeRdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesRdv = TypeRdv::all();
        $i = 0;
        return view('pages/infm/lists/list_typesoin', ['typesRdv' => $typesRdv, 'i' => $i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/infm/form/form_typesoin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomType' => 'required|string||max:255',
            'description' => 'required|string|'
        ]);

        if($validator->fails())
       {
        Flashy::error('Veuillez renseigner des informations correctes svp!');
        return back()->withInput();
       }

       $typeRdv = new TypeRdv();
       $typeRdv->nomType = $request->nomType;
       $typeRdv->description = $request->description;
       $typeRdv->save();

       Flashy::success('Type rendez-vous enregistré avec succès');
       return redirect()->route('typeRdv.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeRdv $typeRdv)
    {
        return view('pages/infm/form/form_typesoin2', ['typeRdv' => $typeRdv]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeRdv $typeRdv)
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
    public function update(Request $request, TypeRdv $typeRdv)
    {
        $validator = Validator::make($request->all(), [
            'nomType' => 'required|string||max:255',
            'description' => 'required|string|'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }

        $typeRdv->update($request->all());
        Flashy::success('Type rendez-vous modifié avec succès');
        return redirect()->route('typeRdv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeRdv $typeRdv)
    {
        $typeRdv->update(['isDel' => 1]);
        Flashy::success('Type rendez-vous supprimé avec succès');
        return redirect()->route('typeRdv.index');
    }
}
