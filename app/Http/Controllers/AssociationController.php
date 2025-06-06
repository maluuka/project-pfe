<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Besoin;
use App\Models\Donation;
use App\Models\Interesse;

class AssociationController extends Controller
{
  public function store(Request $request)
{

    // Validation des données
    $validated = $request->validate([
        'nomassociation' => 'required|string|max:100',
        'emailassociation' => 'required|email|unique:associations,email',
        'password' => 'required|min:8',
        'telephone' => 'required|string|max:20',
        'adresse' => 'required|string',
        'description' => 'required|string',
    ]);

    // Création de l'association
    $association = Association::create([
        'nom_complet' => $validated['nomassociation'],
        'email' => $validated['emailassociation'],
        'mot_de_passe' => Hash::make($validated['password']),
        'telephone' => $validated['telephone'],
        'adresse' => $validated['adresse'],
        'description' => $validated['description'],
        'date_inscription' => now(),
    ]);

    // Authentification de l'association
    auth()->guard('association')->login($association);

    // Redirection vers le profil avec un message de succès
    return redirect()->route('association.profil')
        ->with('success', 'Inscription réussie !');
}

    public function show()
    {
        if (!auth()->guard('association')->check()) {
            return redirect('/connecter');
        }

           $association = Auth::guard('association')->user();

        // Récupérer les 3 besoins urgents
        $urgentNeeds = Besoin::with('association')
            ->where('status', 'Urgent')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    
        // Récupérer les 3 dons récents
        $recentDonations = Donation::with('donateur')
            ->where('statut', 'Disponible')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    
        return view('association.profilassociation', compact('association', 'urgentNeeds', 'recentDonations'));
    }

    public function logout(Request $request)
    {
        auth()->guard('association')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
    
    public function showLoginForm()
    {
        return view('association.connecterassociation');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('association')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('association.profil');
        }
    
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }
    
    public function interesse(Request $request, Donation $donation)
    {
        // Vérifier si l'association est déjà intéressée
        $alreadyInterested = Interesse::where('id_association', auth()->guard('association')->id())
            ->where('id_donation', $donation->id)
            ->exists();
    
        if (!$alreadyInterested) {
            Interesse::create([
                'id_association' => auth()->guard('association')->id(),
                'id_donation' => $donation->id,
                'interesse' => true,
            ]);
    
            return back()->with('success', 'Votre intérêt a été enregistré !');
        }
    
        return back()->with('info', 'Vous avez déjà exprimé votre intérêt pour ce don');
    }
    
    public function indexBesoins()
    {
    if (!auth()->guard('association')->check()) {
        return redirect('/connecter');
    }

    $association = Auth::guard('association')->user();
    $besoins = Besoin::with('association')
                ->orderBy('created_at', 'desc')
                ->get(); // Get ALL besoins, not paginated

    return view('association.tous_les_besoins', compact('association', 'besoins'));
    }
    
    public function indexDons()
    {
    
        $association = Auth::guard('association')->user();
    
        $dons = Donation::with('donateur')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('association.tous_les_dons', compact('association', 'dons'));
    }

    public function storeBesoin(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'required|string',
            'status' => 'required|in:Urgent,Normal',
        ]);
    
        // Get the authenticated association
        $association = Auth::guard('association')->user();
    
        // Create the new besoin
        $besoin = Besoin::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'id_association' => $association->id,
            'date_creation' => now(),
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Votre besoin a été publié avec succès !');
    }

}
