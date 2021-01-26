<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apptask;
use App\appuser;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=apptask::all();
        return view('task.index',['page'=>'Task list','tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $task = new apptask;
        $users=appuser::pluck('login','userid');
        return view('task.create')->with('task',$task)->with('users',$users)
        ->with('page','AddTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new apptask;
        $task->userid=$request->userid;
        $task->title=$request->title;
        $task->details=$request->details;
        $task->creationdate=$request->creationdate;
        $task->priority=$request->priority;
        $task->status=$request->status;
        if(!$task->save())
        {
            $err=$task->getErrors();
            return redirect()->
            action('TaskController@create')->
            with('errors',$err)->withInput();
        }
        return redirect()->
        action('TaskController@index')->
        with('message','New task has been added with id='.$task->taskid.'!'); 
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
        $task=apptask::find($id);
        $users=appuser::pluck('login','userid');   
        return view('task.edit')->with('task',$task)->with('users',$users)
        ->with('page','Task list'); 
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
        $task=apptask::find($id);
        $task->userid=$request->userid;
        $task->title=$request->title;
        $task->details=$request->details;
        $task->creationdate=$request->creationdate;
        $task->priority=$request->priority;
        $task->status=$request->status;

        $task->save();
        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=apptask::find($id);
        $task->delete();
        return redirect('task');
    }
}
