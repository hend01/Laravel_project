<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class FactureController extends Controller
{
    public function extraireFacture(Request $request)
    {
        $client = new Client();

        $cheminImage = 'C:\Users\lenovo\Desktop\laravel\2.png';
        $fileContents = File::get($cheminImage);

        $response = $client->request('POST', 'https://api.edenai.run/v2/ocr/invoice_parser', [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => $fileContents,
                    'filename' => 'facture.png',
                ],
                [
                    'name' => 'providers',
                    'contents' => 'google',
                ],
            ],
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiODc4MDI3NDgtOThiMi00MDNkLWI4M2EtZDNhOTE1MDNkNjBlIiwidHlwZSI6ImZyb250X2FwaV90b2tlbiJ9.J-1pnEAdCjfXcL6cDN3nzE32Py2ekkCjVSV5E51TkP0',
            ],
        ]);

        echo $response->getBody();
    }
}
