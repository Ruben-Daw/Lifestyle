<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
/**
 * It redirects the user to the index page of the users controller.
 * 
 * @return A redirect to the users.index route.
 */
    public function index(){
        return redirect()->route('users.index');
    }
}
