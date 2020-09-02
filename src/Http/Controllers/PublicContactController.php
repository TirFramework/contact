<?php

namespace Tir\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tir\Contact\Entities\Contact;

use Illuminate\Routing\Controller;


class PublicContactController extends Controller
{


    public function contact(Request $request)
    {
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'description' => 'required',
        // ]);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);
    

        $Message = Contact::create(request()->all());
        return $Message;
    }

    
}
