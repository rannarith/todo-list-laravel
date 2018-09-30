<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasks = Task::all(); //get all data from table Tasks
        // $tasks = Task::paginate(4); //Use with pagination
        $tasks = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(4);// Show Task add By User Id
        return view('index', compact('tasks'));
        // $task = DB::table('tasks')->paginate(4);
        // return view('index', ['tasks'=> $task]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
              
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('task'))
        {
            $task =new Task;
            $task->content = $request->input('task');
            Auth::user()->task()->save($task);
        }
        
        return redirect()->back();
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
        $task = Task::find($id);
        return view('edit', compact('task'));
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
        $task = Task::find($id);
        $task->content = $request->input('task');
        $task->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        // return redirect('/'); Or
        return redirect()->back();
    }

    //Update status 
    public function updateStatus($id)
    {
        $task = Task::find($id);
        $task->status = ! $task->status;
        $task->save();
        return redirect()->back();
    }
}
