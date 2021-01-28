<?php

namespace App\Http\Controllers\Backend;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Type;

class TemoignagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temoignages = Temoignage::all();
        return view('backend.temoignages.index')->with([
            'temoignages'=>$temoignages
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
        return view('backend.temoignages.create')->with([
            'types'=>$types
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
        $this->validate($request,[
            'legende'=>'required',
            'lien_video'=>'required',
            'image_post'=>'required',
        ]);

        if ($request->hasFile('image_post')) {
            $filename = $request->image_post->getClientOriginalName();
            $img = Image::make(request()->file('image_post'))->fit(190,105)->save(public_path('/storage/temoignages/'.$filename),80,'jpg');

            $post = new Temoignage();
            $slug = \str_slug($request->legende);

            $post->legende = $request->legende;
            $post->type_id = $request->type_id;
            $post->image = $filename;
            $post->lien = $request->lien_video;
            $post->text = $request->text;
            $post->slug = $slug;

            $post->save();

            $response = ['success',"Le témoignage a été ajouté avec succès"];

        }else {
            $response = ['error',"Le témoignage n'a pas été ajouté"];
        }

        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show(Temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function edit(Temoignage $temoignage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temoignage $temoignage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temoignage $temoignage)
    {
        //
    }
}
