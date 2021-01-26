<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apptask;
use App\appuser;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=appuser::all();
        return view('user.index',['page'=>'User list','users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new appuser;
        return view('user.create',['user'=>$user,'page'=>'AddUser']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new appuser;
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->login=$request->login;
        $user->password=$request->password;
        if(!$user->save())
        {
            $err=$user->getErrors();
            return redirect()->
            action('UserController@create')->
            with('errors',$err)->withInput();
        }
        return redirect()->
        action('UserController@index')->
        with('message','New user "'.$user->login.'" has been added with id='.$user->userid.'!'); 
    
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
        $user=appuser::find($id);   
        return view('user.edit')->with('user',$user)->with('page','User list'); 
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
        $user=appuser::find($id);
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->login=$request->login;
        $user->password=$request->password;

        $user->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=appuser::find($id);
        $user->delete();
        return redirect('user');
    }
}
