<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class candidaturesController extends Controller
{
    

 
public function postuler(Request $request, Offre $offres)
{   

    $user = auth()->user();
    $pdf = $user->pdfs->first();
    $paragraph = $user->paragraphs->first();

    $candidature = new Candidature;
    $candidature->pdfs_id = $pdf->id;
    $candidature->paragraphs_id = $paragraph->id;
    $candidature->user_id = $user->id;
    $candidature->offres_id = $offre->id;
    $candidature->save();

    return response()->json(['success' => true]);
}


}
