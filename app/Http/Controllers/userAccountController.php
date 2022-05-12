<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
