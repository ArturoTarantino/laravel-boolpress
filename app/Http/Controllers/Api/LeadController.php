<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactMail;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // store lead in db 
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // send mail to customer service 
        Mail::to('customerservice@boolpress.it')->send(new NewContactMail($new_lead));

    }
}
