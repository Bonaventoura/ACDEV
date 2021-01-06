<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use App\Models\Projet;

class FrontendController extends Controller
{
    public function welcome()
    {
        return view('frontend.welcome');
    }

    public function projets()
    {
        $projets = Projet::select('*')->orderBy('id','desc')->get();
        return view('frontend.projets.index')->with([
            'projets'=>$projets
        ]);
    }

    public function detail_projet($titre)
    {
        $projet = $this->getProjet($titre);
        return view('frontend.projets.detail')->with([
            'projet'=>$projet
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


}
