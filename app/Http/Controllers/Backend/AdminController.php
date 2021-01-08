<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function publierPost(Post $post)
    {
        $this->updatePost($post,1);

        session()->flash('success',"Le statut du post a été modifié correctement, post publier");
        return redirect()->back();
    }

    public function hidePost(Post $post)
    {
        $this->updatePost($post,0);

        session()->flash('success',"Le statut du post a été modifié avec succès, post mis en privé");
        return redirect()->back();
    }

    public function updatePost(Post $post,$v)
    {
        return Post::where('id','=',$post)->update([
            'publier'=>$v
        ]);
    }
}
