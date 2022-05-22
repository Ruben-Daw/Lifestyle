<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{

    /**
     * It searches the database for the user's last name, first name, or email, and returns the results
     * in a paginated list.
     * 
     * @param Request request The request object.
     * 
     * @return The view is being returned.
     */
    public function index(Request $request)
    {

        $search = trim($request->get('search'));

        $users = DB::table('users')
            ->select('user_id','name','last_names','email','role')
            ->where('last_names','LIKE','%'.$search.'%')
            ->orWhere('name','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->orderBy('last_names','asc')
            ->paginate(10);
            
        return view('admin.viewUsers', compact('users','search'));
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
    public function store()
    {

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
    public function edit($id)
    {
        //
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
    * It deletes the user with the given id
    * 
    * @param id The id of the user to be deleted.
    * 
    * @return The user is being returned.
    */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index');
    }
}
