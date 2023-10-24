<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class produitController extends Controller
{
    public function create()
    {
        return view('admin.produit.add');

    }

    public function show()
    {
        $produits = produit::all();
        return view('admin.produit.show', compact('produits'));

    }
    public function get( $id){
        $produit = produit::findOrFail($id);
       
        return View ("front.produit.get", compact('produit'));
    }
    public function index()
    {
        $produits = produit::all();
        return view('front.produit.index', compact('produits'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'offer' => 'required|int',
            'prix' => 'required|int',
        ]);

        if (auth()->check()) {
            $userId = auth()->user()->id;
            $produit=produit::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'offer' => $request->input('offer'),
                'prix' => $request->input('prix'),
                'id_user' => $userId,
            ]);
            $this->sendTestEmail("produit added");

            return redirect()->route('produits.show')
                ->with('success', 'Done.');
        } else {
            return redirect()->route('login')->with('error', 'Error.');
        }
    }

    public function destroy(produit $produit) {
        if (auth()->check()) {
            $userId = auth()->user()->role;
            if ($userId==="admin") {
                $produit->delete();
            }
            return redirect()->route('produits.show')->with('success', 'produit deleted successfully.');
        }
        return redirect()->route('home')->with('success', 'produit deleted successfully.');
    }
    public function edit($id)
    {

        $produit = produit::find($id);

        if (!$produit) {
            return redirect()->route('produits.show')
            ->with('error', 'produit introuvable.');
        }

        return view('admin.produit.get', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'offer' => 'required|int|max:100',
            'prix' => 'required|int',
        ]);

        $produit = produit::find($id);

        if (!$produit) {
            return redirect()->route('produits.show')
            ->with('error', 'produit not found.');
        }

        $produit->name = $validatedData['name'];
        $produit->description = $validatedData['description'];
        $produit->offer = $validatedData['offer'];
        $produit->prix = $validatedData['prix'];

        $produit->save();

        return redirect()->route('produits.show')
        ->with('success', 'produit has been updated successfully.');
    }


    public function sendTestEmail($content)
{
    Mail::raw($content, function ($message) {
        $message->to('hazem.ghannem@esprit.tn', 'Your Name');
        $message->subject('Test Email');
    });

    return 'Test email sent successfully';
}
}
