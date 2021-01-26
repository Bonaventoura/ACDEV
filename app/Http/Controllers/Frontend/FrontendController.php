<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partenaire;
use App\Models\Post;
use App\Models\Projet;
use App\Models\Temoignage;

class FrontendController extends Controller
{
    public function welcome()
    {
        $projets = $this->last_projets();
        $posts = $this->last_posts();
        return view('frontend.welcome')->with([
            'projets'=>$projets,
            'posts'=>$posts
        ]);
    }

    public function projets()
    {
        $projets = Projet::select('*')->orderBy('id','desc')->paginate(8);
        return view('frontend.projets.index')->with([
            'projets'=>$projets
        ]);
    }

    public function detail_projet($titre)
    {
        $projet = $this->getProjet($titre);

        $partenaires = Projet::find($projet->id)->partenaires()->get();
        //dd($partenaires);

        $galleries = Projet::find($projet->id)->galleries()->get();
        //dd($galleries);

        return view('frontend.projets.detail')->with([
            'projet'=>$projet,
            'partenaires'=>$partenaires,
            'galleries'=>$galleries,
        ]);
    }



    public function partenaires()
    {
        $partenaires = Partenaire::select('*')->orderBy('id','desc')->get();
        return view('frontend.partenaires.index')->with([
            'partenaires'=>$partenaires
        ]);
    }

    public function show_partenaire($nom)
    {
        $partenaire = $this->getPartenaire($nom);
        return view('frontend.partenaires.show-partenaire')->with([
            'partenaire'=>$partenaire,
        ]);
    }

    public function presentation()
    {
        return view('frontend.presentation');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function last_posts()
    {
        return $posts = Post::orderBy('id','desc')->limit(3)->paginate(6);
    }

    public function last_projets()
    {
        return $projets = Projet::orderBy('id','desc')->limit(3)->paginate(6);
    }

    public function blog()
    {
        $posts = Post::orderBy('id','desc')->paginate(6);
        return view('frontend.blog.index')->with([
            'posts'=>$posts
        ]);
    }

    public function single_post($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $categories = Category::all();
        if ($post) {
            return view('frontend.blog.show')->with([
                'post'=>$post,
                'categories'=>$categories
            ]);
        } else {
            session()->flash('alert',"Le post que vous essayez d'accéder n'existe pas ou n'est pas encore publié");
            return redirect()->back();
        }

    }

    public function galery()
    {
        return view('frontend.galery');
    }

    public function temoignages()
    {
        $temoignages = Temoignage::orderBy('id','desc')->paginate(8);
        return view('frontend.temoignage.index')->with([
            'temoignages'=>$temoignages
        ]);
    }


}
