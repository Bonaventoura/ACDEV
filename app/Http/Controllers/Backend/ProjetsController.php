<?php

namespace App\Http\Controllers\Backend;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etat;
use App\Models\Partenaire;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::orderBy('id','desc')->get();

        return view('backend.projets.index')->with([
            'projets'=>$projets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $etats = Etat::all();
        $partenaires = Partenaire::all();
        return view('backend.projets.create')->with([
            'types'=>$types,
            'etats'=>$etats,
            'partenaires'=>$partenaires
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'titre'=>'required',
            'type_id'=>'required',
            'etat_id'=>'required',
            'localite'=>'required',
            'objectifs'=>'required',
            'resultats'=>'required',
            'date_start'=>'required',
            'date_end'=>'required',
            'image_projet'=>'required',
        ]);

        $response = [];

        if ($request->hasFile('image_projet')) {
            $filename = $request->image_projet->getClientOriginalName();
            $img = Image::make(request()->file('image_projet'))->fit(190,105)->save(public_path('/storage/projets/'.$filename),80,'jpg');

            $projet = new Projet();

            $projet->titre = $request->titre;
            $projet->type_id = $request->type_id;
            $projet->etat_id = $request->etat_id;
            $projet->localite = $request->localite;
            $projet->objectifs = $request->objectifs;
            $projet->resultats = $request->resultats;
            $projet->date_start = $request->date_start;
            $projet->date_end = $request->date_end;
            $projet->description = $request->description;
            $projet->cout_projet = $request->cout_projet;
            $projet->image = $filename;
            $projet->beneficiaires = $request->beneficiaires;

            $projet->save();

            $projet->partenaires()->attach($request->partenaire_id);

            $response = [
                'success'=>"Le projet a été ajouté avec succès"
            ];
        }else {
            $response = ['error'=>"Erreur... Veuillez remplir correctement le formulaire"];
        }

        return response()->json($response,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $types = Type::all();
        $etats = Etat::all();
        $partenaires = Partenaire::all();
        return view('backend.projets.edit')->with([
            'projet'=>$projet,
            'types'=>$types,
            'etats'=>$etats,
            'partenaires'=>$partenaires
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        if ($request->hasFile('image_projet')) {
            $filename = $request->image_projet->getClientOriginalName();
            $img = Image::make(request()->file('image_projet'))->fit(190,105)->save(public_path('/storage/projets/'.$filename),80,'jpg');
            $projet->image = $filename;
        }

        $projet->titre = $request->titre;
        $projet->type_id = $request->type_id;
        $projet->etat_id = $request->etat_id;
        $projet->localite = $request->localite;
        $projet->objectifs = $request->objectifs;
        $projet->resultats = $request->resultats;
        $projet->date_start = $request->date_start;
        $projet->date_end = $request->date_end;
        $projet->description = $request->description;
        $projet->cout_projet = $request->cout_projet;

        $projet->beneficiaires = $request->beneficiaires;

        $projet->save();

        $projet->partenaires()->sync($request->partenaire_id);

        session()->flash('success',"Le projet a été modifié avec succès");
        return redirect()->route('projets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        Projet::find($projet)->delete();
        session()->flash('success',"Le projet a été modifié avec succès");
        return redirect()->route('projets.index');
    }
}
