<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;

use Illuminate\Http\Request;


class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::all();
        return view('Annonce.ShowAnnonce', compact('annonces'));
    }
    public function Back()
    {
        $annonces = Annonce::all();
        return view('back.ShowAnnonceBack', compact('annonces'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Annonce.FormAnnonce', compact('categories'));
       
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'id_categorie'=>'required',
            'id_user'=>'nullable',
            'titre' => 'required|string',
            'description' => 'required|string',
            'telephone' => 'required|numeric',
            'photo' => 'image',
            'echange' => 'nullable|required', ],
             [
            'titre.required' => 'Le champ titre est obligatoire.',
             
            'description.required' => 'Le champ description est obligatoire.',
           
            'telephone.required' => 'Le champ téléphone est obligatoire.', 
            'telephone.numeric' => 'Le champ téléphone doit être un numéro.',
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('annonce_photos', 'public');
            $validatedData['photo'] = $imagePath;
        }
        
   

       Annonce::create($validatedData);

        return redirect()->route('annonces.index')->with('success', 'Annonce created successfully');
    }

    public function show(Annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }
    

    public function edit(Annonce $annonce)
   
    { 
        $categories = Category::all();
       
        return view('Annonce.FormEditAnnonce', compact('categories','annonce'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $validatedData = $request->validate([
            'id_categorie'=>'nullable|required',
            'titre' => 'required',
            'description' => 'required',
            'telephone' => 'required',
            'photo' => 'nullable|image',
            'echange' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('annonce_photos', 'public');
            $validatedData['photo'] = $imagePath;
        }

        $annonce->update($validatedData);

        return redirect()->route('annonces.index')->with('success', 'Annonce updated successfully');
    }

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', 'Annonce deleted successfully');
    }




    public function destroyBack(Annonce $annonce)
    {
        $annonce->delete();
        $annonces = Annonce::all();
        return view('back.ShowAnnonceBack', compact('annonces'));
        
    }





    public function search(Request $request)
{
    $search = $request->input('search');
    
    // Affichez le terme de recherche pour vérification
  

    // Effectuez la recherche en utilisant le titre de l'annonce
    $annonces = Annonce::where('titre', 'like', '%' . $search . '%')->get();

    // Affichez les résultats intermédiaires pour vérification
   

    return view('Annonce.Find', compact('annonces', 'search'));
}



}
