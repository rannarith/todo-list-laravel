<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use App\Invitation;
use App\User;
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
        if(Auth::user()->is_admin)
        {
            $coworkers = Invitation::where('admin_id',Auth::user()->id)->where('accepted',1)->get();
            $invitations = Invitation::where('admin_id',Auth::user()->id)->where('accepted',0)->get();
            $tasks = Task::where('user_id', Auth::user()->id)->orwhere('admin_id', Auth::user()->admin_id)->orderBy('created_at', 'DESC')->paginate(4);// Show Task add By User Id
        }
        else
        {
            $invitations = [];
            $tasks = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(4);// Show Task add By User Id
            $coworkers = User::where('is_admin',1)->get();
        }
        
        return view('index', compact('tasks','coworkers','invitations'));
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

    public function sendInvitation (Request $request) 
    {
        // $Invite = !Invitation::where('coworker_id',Auth::user()->id)->where('admin_id', $request->input('admin'));
        if((int) $request->input('admin') >0 
        && !Invitation::where('coworker_id',Auth::user()->id)->where('admin_id', $request->input('admin'))->exists() 
        )
        {
            $invitation = new Invitation;
            $invitation->coworker_id = Auth::user()->id;
            $invitation->admin_id = (int) $request->input('admin');
            $invitation->save();
        }

        return redirect()->back();
    }

    public function acceptInvitation($id)
    {
        $invitation = Invitation::find($id);
        $invitation->accepted = true;
        $invitation->save();
        return redirect()->back();
    }

    public function denyInvitation($id)
    {
        $invitation = Invitation::find($id);
        $invitation->delete();
        return redirect()->back();
    }
    
    // public function deleteCoworker($id)
    // {
    //     $coworker = Invitation::find($id);
    //     $coworker->delete();
    //     return redirect()->back();
    // }

}
