<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    //
    public function changeLocale(Request $request)
    {
        $this->validate($request, ['locale' => 'required|in:it,en']);


        \Session::put('locale', $request['locale']);

        return redirect()->back();
    }
}
