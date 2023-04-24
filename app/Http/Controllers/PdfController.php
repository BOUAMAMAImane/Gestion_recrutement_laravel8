<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pdf;

class PdfController extends Controller
{   public function index()
    {
        $pdfs = Pdf::where('user_id', Auth::id())->get();
        return view('home', compact('pdfs'));

    }
    public function create()
    {
        return view('pdfs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $user = Auth::user();
    
        $pdf_file = $request->file('pdf_file');
        $pdf_file_name = time() . '_' . $pdf_file->getClientOriginalName();
        $pdf_file_path = $pdf_file->storeAs('pdfs', $pdf_file_name, 'public');
    
        $pdf = new Pdf();
        $pdf->title = $request->input('title');
        $pdf->filename = $pdf_file_name;
        $pdf->user_id = $user->id;
        $pdf->save();
    
        return redirect()->route('home')
            ->with('success', 'PDF added successfully.');  
    }
    public function show($id)
{
    $pdf = Pdf::find($id);

    if ($pdf) {
        $path = storage_path('app/public/pdfs/' . $pdf->filename);
        if (file_exists($path)) {
            return response()->file($path, ['Content-Type' => 'application/pdf']);
        } else {
            abort(404);
        }
    } else {
        abort(404);
    }
}
public function destroy($id)
{
    $pdf = Pdf::findOrFail($id);
    $pdf->delete();

    return redirect()->route('home')->with('success', 'Le PDF a été supprimé avec succès.');
}
public function update(Request $request, $id)
{
    $pdf = Pdf::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'pdf' => 'nullable|mimes:pdf|max:10240', // 10 MB
    ]);

    $pdf->title = $request->input('title');

    if ($request->hasFile('pdf')) {
        // Supprimer l'ancien fichier PDF s'il existe
        Storage::delete('public/pdfs/'.$pdf->filename);

        // Enregistrer le nouveau fichier PDF
        $pdfFile = $request->file('pdf');
        $pdfFileName = time().'_'.$pdfFile->getClientOriginalName();
        $pdfFile->storeAs('public/pdfs', $pdfFileName);
        $pdf->filename = $pdfFileName;
    }

    $pdf->save();

    return redirect()->route('home')->with('success', 'Le PDF a été modifié avec succès.');
}

public function edit($id)
{
    $pdf = Pdf::findOrFail($id);
    return view('edit', compact('pdf'));
}



}
