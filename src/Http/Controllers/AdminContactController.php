<?php

namespace Tir\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tir\Contact\Entities\Contact;
use Tir\Crud\Controllers\CrudController;

class AdminContactController extends CrudController
{
    protected $model = Contact::Class;

    public function storeRequestManipulation(Request $request)
    {
        if(empty($request->author_id)){
            $request->merge(['author_id' => Auth::id()]);
        }

        return $request;
    }

}
