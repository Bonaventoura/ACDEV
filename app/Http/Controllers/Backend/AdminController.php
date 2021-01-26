<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function publierPost($post)
    {
        $update = $this->updatePost($post,1);
        //dd($update);

        session()->flash('success',"Le statut du post a été modifié correctement, post publier");
        return redirect()->back();
    }

    public function hidePost($post)
    {
        $this->updatePost($post,0);

        session()->flash('success',"Le statut du post a été modifié avec succès, post mis en privé");
        return redirect()->back();
    }

    public function updatePost($post,$v)
    {
        $up =  Post::where('id','=',$post)->update([
            'publier'=>$v
        ]);
        return $up;
    }

    public function addGallery(Request $request)
    {
        $validate =  $this->validate($request,[
            'projet_id'=>'required',
            'image_gallery'=>'required'
        ]);

        $response = [];

        if ($validate) {

            $filename = $request->image_gallery->getClientOriginalName();
            $img = Image::make(request()->file('image_gallery'))->fit(190,105)->save(public_path('/storage/gallery/'.$filename),80,'jpg');

            Gallery::create([
                'projet_id'=>$request->projet_id,
                'legende'=>$request->legende,
                'image'=>$filename
            ]);

            $response = [
                'success'=>"L'image a été ajoutée à la gallerie du projet avec succès",
                'src'=> "/storage/gallery/".$filename
            ];

            return response()->json($response,200);
        }
    }
}
