<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Projet;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return projet
     */
    public function getProjet($titre)
    {
        $projet = Projet::where('titre','=',$titre)->get();

        foreach ($projet as $key => $value) {
            return $value;
        }
    }

    /**
     * @return partenaire
     */
    public function getPartenaire($nom)
    {
        $partenaire = Partenaire::where('nom','=',$nom)->get();

        foreach ($projet as $key => $value) {
            return $value;
        }
    }
}
