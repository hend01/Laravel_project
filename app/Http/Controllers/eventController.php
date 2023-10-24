<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
class eventController extends Controller
{
    public function index()
    {
        $events = event::all();
        return view('front.event.index', compact('events'));
    }
    public function show()
    {
        $events = event::all();
        return view('admin.event.show', compact('events'));

    }
    public function create()
    {
        return view('admin.event.add');
    }

    public function store(Request $request)
    {
        $produits  = produit::all();
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'event_type' => 'required|string|min:4',
            'produit_number' => 'required|int',
        ]);

        if (auth()->check()) {
            $userId = auth()->user()->id;
            $event = event::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'event_type' => $request->input('event_type'),
                'produit_number' => $request->input('produit_number'),
                'id_user' => $userId,
            ]);
            $event->produit()->attach($produits);
            $this->sendTestEmail("produit added");
            // $this->sendSMS("produit added");

            return redirect()->route('events.show')
                ->with('success', 'Done.');
        } else {
            return redirect()->route('events.show')->with('error', 'Error.');
        }
    }

    public function get($id)
    {
        $event = event::findOrFail($id);
        $produit=$event->produit()->get();
        
        return View("front.event.get", compact('event','produit'));
    }

    public function participate($id)
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;

            $event = event::findOrFail($id);
            $event->usere()->attach($userId);


            return redirect()->route('home')
                ->with('success', 'participated.');
        } else {
            return redirect()->route('login')->with('error', 'error');
        }
    }

    public function destroy(Event $event)
    {
        
                $event->delete();
         
            return redirect()->route('events.show')->with('success', 'Event deleted successfully.');
       
    }
    public function edit($id)
    {

        $event = event::find($id);

        if (!$event) {
            return redirect('/eventss')->with('error', 'event introuvable.');
        }

        return view('admin.event.get', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $test=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'produit_number' => 'required|string|min:1',
            'event_type' => 'required|string|min:4',
        ]);

        $event = event::find($id);

        if (!$event) {
            return redirect('/eventss')->with('error', 'event not found.');
        }

        $event->name = $test['name'];
        $event->description = $test['description'];
        $event->produit_number =$test ['produit_number'];
        $event->event_type = $test['event_type'];

        $event->save();

        return redirect('/eventss')->with('success', 'event has been updated successfully.');
    }
    
    public  function  sendTestEmail($content)
    {
        Mail::raw($content, function ($message) {
            $message->to('hazem.ghannem@esprit.tn', 'Your Name');
            $message->subject('Test Email');
        });
    
        return 'Test email sent successfully';
    }

    public function sendSMS($content)
    {
        $twilioAccountSid = env('TWILIO_ACCOUNT_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');
        $client = new Client($twilioAccountSid, $twilioAuthToken);
        $to = ('+21627300520');
        $client->messages->create($to, [
            'from' => $twilioPhoneNumber,
            'body' => $content,
        ]);

        return "SMS sent successfully!";
    }
}
