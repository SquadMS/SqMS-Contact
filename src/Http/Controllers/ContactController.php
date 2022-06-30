<?php

namespace SquadMS\Contact\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use SquadMS\Contact\Http\Requests\SendContactMessage;
use SquadMS\Contact\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * Stores a ContactMessage sent by the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return View::make('sqms-contact::contact');
    }

    /**
     * Stores a ContactMessage sent by the user
     *
     * @return \Illuminate\Http\Response
     */
    public function send(SendContactMessage $request)
    {
        /* Validate request and create message */
        ContactMessage::create($request->validated());

        /* Show population view as text */
        return Response::back()->withSuccess(Lang::get('sqms-contact.messages.success'));
    }
}
