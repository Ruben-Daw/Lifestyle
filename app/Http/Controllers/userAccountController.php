<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userAccountController extends Controller
{
    
    /**
     * It gets the user data from the database and returns it to the view.
     * 
     * @return An array of objects.
     */
    public function index()
    {
        $userData = DB::table('users')
            ->where('user_id', '=', auth()->id())
            ->get()
            ->toarray()[0];

        return view('userAccount', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * If the email is valid, then update the email in the database and redirect to the home page with
     * a success message.
     * If the email is not valid, then redirect to the userAccount page with an error message.
     * 
     * @param Request request The request object.
     * 
     * @return The user is being returned.
     */
    public function editEmail(Request $request)
    {
        if(filter_var( $request->get('emailAccount') , FILTER_VALIDATE_EMAIL)){
            $user = User::findOrFail(auth()->id());
            $user->email = $request->get('emailAccount');
            $user->save();
            return redirect()->route('home')->with('message', 'El email ha sigut modificat correctament');
        }

        return redirect()->route('userAccount.index')->withSuccess('El nou email ha introduir ha de tenir un format correcte');

        
    }

    /**
     * If the user has filled in the form correctly, the data is updated in the database and the user
     * is redirected to the home page with a message. If the user has not filled in the form correctly,
     * the user is redirected to the userAccount page with a message
     * 
     * @param Request request The request object.
     * 
     * @return The user is being returned.
     */
    public function editUserPersonalData(Request $request)
    {
        
        if($request->get('nameAccount')!=null && $request->get('lastNamesAccount')!=null && $request->get('data_naixement')!=null){
            $user = User::findOrFail(auth()->id());
            $user->name = $request->get('nameAccount');
            $user->last_names = $request->get('lastNamesAccount');
            $user->date_of_birth = $request->get('data_naixement');
            $user->save();
            return redirect()->route('home')->with('message', 'Las dades personals han sigut modificades correctament');
        }

        return redirect()->route('userAccount.index')->withSuccess('Las noves dades personals a modificar han de ser correctes');
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
