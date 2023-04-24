<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Paragraph;


class ParagraphController extends Controller
{
    public function index()
{
    $paragraphs = Paragraph::all(); // Récupération de tous les paragraphes
    return view('home', ['paragraphs' => $paragraphs]);
     /*$user_id = Auth::id();
    $paragraphs = Paragraph::where('user_id', $user_id)->get();
    return view('home', ['paragraphs' => $paragraphs]);*/
}
    public function create()
    {
        return view('paragraphs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $paragraph = new Paragraph([
            'content' => $request->get('content'),
        ]);

        $paragraph->user_id = Auth::id();
        $paragraph->save();

        return redirect('/home')->with('success', 'Le paragraphe a été ajouté avec succès.');
    }

    public function destroy(Paragraph $paragraph)
        {
            
            $paragraph->delete();

            return redirect()->route('home')
                            ->with('success', 'Le paragraphe a été supprimé avec succès.');
        }
    public function edit(Paragraph $paragraph)
        {
            return view('editpara', compact('paragraph'));
        }
   
    public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'content' => 'required',
            ]);
        
            $paragraph = Paragraph::find($id);
            $paragraph->content = $request->input('content');
            $paragraph->save();
        
            return redirect()->route('home')->with('success', 'Paragraphe modifié avec succès!');
        }
        
             

}
