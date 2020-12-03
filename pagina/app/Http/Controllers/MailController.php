<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Mail;

class MailController extends Controller
{
    public function Contactenos(Request $request)
    {
        Mail::to('yonathanwilliammc@gmail.com')->send(new ContactUs($request));
        if(count(Mail::failures()) > 0)
        {
            $response = array("state" => "failed", "message" => "No se puede enviar el mensaje en este momento. Inténtelo nuevamente más tarde.");
        }
        else
        {
            $response = array("state" => "success", "message" => "Mensaje enviado correctamente.");
        }
        return response()->json($response);
    }
}
