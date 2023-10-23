<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log; // Assurez-vous d'importer la classe Log depuis le bon namespace
use App\Models\Facture;
use Illuminate\Support\Facades\Validator;



class FactureController extends Controller
{

    public function showUploadForm()
{
    return view('admin/Facture/Facture-Upload');
}

public function uploadAndExtractFacture(Request $request)
{

    $rules = [
        'factureFile' => 'required|file|mimes:jpg,png,pdf|max:2048', // Ajoutez ici la règle pour les types et la taille du fichier
    ];
    $messages = [
        'factureFile.required' => 'Le champ du fichier de facture est requis.',
        'factureFile.file' => 'Le fichier de facture est invalide.',
        'factureFile.mimes' => 'Le fichier de facture doit être de type jpg, png ou pdf.',
        'factureFile.max' => 'Le fichier de facture ne doit pas dépasser 2 Mo.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->route('facture.upload')->withErrors($validator);
    }
    // Validez et traitez le fichier de facture ici
    $uploadedFile = $request->file('factureFile');

    if ($uploadedFile) {
        // Assurez-vous de stocker le fichier, si nécessaire
        $path = $uploadedFile->store('factures');

        // Ensuite, extrayez les données de la facture en utilisant votre API
        $client = new Client();

        $response = $client->request('POST', 'https://api.edenai.run/v2/ocr/invoice_parser', [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen(storage_path('app/' . $path), 'r'), // Utilisez fopen pour ouvrir le fichier
                    'filename' => $uploadedFile->getClientOriginalName(),
                ],
                [
                    'name' => 'providers',
                    'contents' => 'google',  // Vous pouvez ajuster le fournisseur si nécessaire
                ],
                [
                    'name' => 'response_as_dict',
                    'contents' => 'false',  // Définissez response_as_dict sur true
                ],
            ],
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiN2Q3MGMyYzAtZTI4ZC00MjM4LThlZjItNjViZTA0NzE5NGFlIiwidHlwZSI6ImZyb250X2FwaV90b2tlbiJ9.YTHZ34_daN9vDQVo41MHCm-U4uGF37FVlavrtCUBfQA', // Remplacez par votre clé d'autorisation
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Retournez la vue "resultat" avec les données extraites
        return view('admin/facture/Facture-Upload', ['data' => $responseData]);
    }
               
    // Gérez le cas où le fichier n'a pas été téléchargé ici
    return redirect()->route('facture.upload.form')->with('error', 'Aucun fichier de facture téléchargé.');
}

public function saveFacture(Request $request)
{
    $factureData = json_decode($request->input('facture_data'), true);

    // Assurez-vous d'ajouter la logique pour valider et enregistrer les données dans la base de données
    // Créez une instance du modèle Facture (assurez-vous d'importer le modèle Facture en haut du fichier)
    $facture = new Facture();

    // Affectez les attributs en fonction des données de la facture
    $facture->numero_facture = $factureData['invoice_number'];
    $facture->date_facture = $factureData['date'];
    $facture->montant = $factureData['invoice_total'];

    // Affectez tous les autres attributs en fonction des données de la facture
    // Exemple :
    $facture->nom_client = $factureData['customer_information']['customer_name'];
    $facture->adresse_client = $factureData['customer_information']['customer_address'];
    $facture->email_client = $factureData['customer_information']['customer_email'];
    $facture->numero_client = $factureData['customer_information']['customer_id'];
    $facture->nom_marchand = $factureData['merchant_information']['merchant_name'];
    $facture->adresse_marchand = $factureData['merchant_information']['merchant_address'];
    $facture->telephone_marchand = $factureData['merchant_information']['merchant_phone'];
    $facture->email_marchand = $factureData['merchant_information']['merchant_email'];
    $facture->total = $factureData['invoice_total'];
    $facture->date_echeance = $factureData['due_date'];

    // Ajoutez d'autres attributs en fonction des données de la facture

    $facture->save();

    return redirect()->route('facture.index')->with('error', 'Aucun fichier de facture téléchargé.');
}





    public function index()
    {
        $factures = Facture::all();
        return view('admin.facture.index', compact('factures'));
    }

    public function edit($id)
    {
        $facture = Facture::find($id);
        return view('admin.facture.edit', compact('facture'));
    }

    public function update(Request $request, $id)
    {
        $facture = Facture::find($id);

        $facture->update($request->all());

        return redirect()->route('facture.index')->with('success', 'Facture mise à jour avec succès');
    }

    public function destroy($id)
    {
        $facture = Facture::find($id);
        $facture->delete();

        return redirect()->route('facture.index')->with('success', 'Facture supprimée avec succès');
    }
}



