<?php
namespace App\Http\Controllers;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\candidatures;
use App\Models\PDF;
use App\Models\Paragraph;


class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()

    {   $user_id = auth()->user()->id; // récupère l'id de l'utilisateur authentifié
        $offres = Offre::where('user_id', $user_id)->get();
        return view('recruiterdashboard', ['offres' => $offres]);
       
    }
    public function postuler(Request $request, Offre $offre)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour postuler à une offre.');
        }
        
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
         // Vérifier si l'utilisateur a déjà postulé pour cette offre
            if ($user->candidatures()->where('offres_id', $offre->id)->exists()) {
                return redirect()->route('offre.showauth', $offre)->with('error', 'Vous avez déjà postulé pour cette offre.');
            }
        
        // Récupérer le dernier PDF et le dernier paragraphe ajoutés par l'utilisateur
        
        $pdf = $user->pdfs()->latest()->first();
        $paragraph = $user->paragraphes()->latest()->first();

        
        if ($pdf && $paragraph) {
            $candidature = new candidatures;
            $candidature->pdfs_id = $pdf->id;
            $candidature->paragraphs_id = $paragraph->id;
            $candidature->user_id = $user->id;
            $candidature->offres_id = $offre->id;
            $candidature->save();
            
            return redirect()->route('offre.showauth', $offre)->with('success', 'Votre candidature a été enregistrée avec succès.');
        } else {
            return response()->json(['success' => false, 'message' => 'Error: Could not find user pdf or paragraph.']);
        }
    
}  
    public function showCandidatures(Offre $offre)
    {
       $candidatures = candidatures::with(['user', 'pdf', 'paragraph'])
        ->where('offres_id', $offre->id)
        ->get()
        ->map(function ($candidature) {
            $pdf = PDF::select('title', 'filename')->find($candidature->pdfs_id);
            $paragraph = Paragraph::select('content')->find($candidature->paragraphs_id);
            $candidature->pdf = $pdf;
            $candidature->paragraph = $paragraph;
            return $candidature;
        });


    // Afficher la vue avec les données récupérées
        return view('offresshowauth', compact('offre', 'candidatures'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showauth()
    {
        $offres = Offre::all();
        return view('Offresauth', ['offres' => $offres]);
    }
    public function show()
    {
        $offres = Offre::all();
        return view('Offres', ['offres' => $offres]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre_poste' => ['required', 'string', 'max:255'],
            'type_contrat' => ['required', 'string', 'max:255'],
            'entreprise' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

            // Enregistrer l'offre d'emploi
            $offre = new Offre;
            $offre->titre_poste = $validatedData['titre_poste'];
            $offre->type_contrat = $validatedData['type_contrat'];
            $offre->entreprise = $validatedData['entreprise'];
            $offre->ville = $validatedData['ville'];
            $offre->description = $validatedData['description'];
            $offre->user_id = auth()->user()->id;
            $offre->save();

            // Rediriger l'utilisateur vers la liste des offres d'emploi
            return redirect()->route('offres.index')
                            ->with('success', 'Offre d\'emploi ajoutée avec succès.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre = Offre::findOrFail($id);
        return view('editoffre', compact('offre'));
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
        $request->validate([
            'titre_poste' => 'required|max:255',
            'type_contrat' => 'required|max:255',
            'ville' => 'required|max:255',
            'entreprise' => 'required|max:255',
            'description' => 'required',
        ]);

        $offre = Offre::findOrFail($id);
        $offre->titre_poste = $request->get('titre_poste');
        $offre->type_contrat = $request->get('type_contrat');
        $offre->ville = $request->get('ville');
        $offre->entreprise = $request->get('entreprise');
        $offre->description = $request->get('description');
        $offre->save();

        return redirect('/recruiterdashboard')->with('success', 'Offre modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offre::destroy($id);
        return redirect()->route('recruiterdashboard')->with('success', 'Offre supprimée avec succès');
    }
}
