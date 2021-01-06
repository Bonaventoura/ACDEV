<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('backend.partenaires.index')->with([
            'partenaires'=>$partenaires
        ]);
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
        /*$validator = Validator::make($request->all(),[
            'nom_partenaire'=>'required',
            'logo'=>'required|image|mimes:png,jpg,jpeg',
            'description'=>'required',
        ]); */
        $validator = $this->validate($request,[
            'nom_partenaire'=>'required',
            'logo'=>'required'
        ]);

        $response = [];
        if ($request->hasFile('logo')) {
            $filename = $request->logo->getClientOriginalName();
            $img = Image::make(request()->file('logo'))->fit(190,105)->save(public_path('/storage/partenaires/'.$filename),80,'jpg');

            $partenaire = new Partenaire();
            $partenaire->nom_partenaire = $request->nom_partenaire;
            $partenaire->description = $request->description;
            $partenaire->logo = $filename;

            $partenaire->save();

            $response = ['success'=>"Le partenaire ajouté avec succès"];
        }else {
            $response = ['error'=>"Veuillez remplir correctement les champs"];
        }

        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }
}
