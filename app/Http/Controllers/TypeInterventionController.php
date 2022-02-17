<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeIntervention;
use Illuminate\Support\Facades\Validator;
use Flashy;

class TypeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesInter = TypeIntervention::all();
        $i = 0;
        return view('pages/infm/lists/list_typeintervention', ['typesInter' => $typesInter, 'i' => $i]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/infm/form/form_typeintervention');
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

       $typeIntervention = new TypeIntervention();
       $typeIntervention->nomType = $request->nomType;
       $typeIntervention->description = $request->description;
       $typeIntervention->save();

       Flashy::success('Type d\'intervention enregistré avec succès');
       return redirect()->route('typeIntervention.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeInter = TypeIntervention::findOrFail($id);
        return view('pages/infm/form/form_typeintervention2', ['typeInter' => $typeInter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeIntervention $typeInter)
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
        $validator = Validator::make($request->all(), [
            'nomType' => 'required|string||max:255',
            'description' => 'required|string|'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }
        $typeInter = TypeIntervention::findOrFail($id);
        $typeInter->update($request->all());
        Flashy::success('Type d\'intervention modifié avec succès');
        return redirect()->route('typeIntervention.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeIntervention::findOrFail($id)->delete();
        Flashy::success('Type d\'intervention supprimé avec succès');
        return redirect()->route('typeIntervention.index');
    }
}
