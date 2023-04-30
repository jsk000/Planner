<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DoneNotification;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Task::where('user_id', Auth::user()->id)->orderBy('duration', 'asc')->get();
        $members = Member::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();
        return view('home', compact('todos', 'members'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'=> 'required|string',
            'assignee'=> 'required|string|max:255',
            'duration'=> 'required|date',
            'completed'=> 'nullable' 
        ]);
        
        $todo = new Task;
        $todo->title = $request->input('title');       
        $todo->assignee = $request->input('assignee');
        $todo->duration = $request->input('duration'); 

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return back()->with('success', 'New task added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Task::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('delete_todo', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Task::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $members = Member::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();
        return view('edit_todo', compact('todo', 'members'));
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
        $this->validate($request, [
            'title'=> 'required|string',
            'assignee'=> 'required|string|max:255',
            'duration'=> 'required|date',
            'completed'=> 'nullable' 
        ]);
        
        $todo = Task::find($id);
        $todo->title = $request->input('title');       
        $todo->assignee = $request->input('assignee');
        $todo->duration = $request->input('duration'); 

        $todo->save();

        return redirect()->route('home.index')->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Task::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $todo->delete();
        return redirect()->route('home.index')->with('success', 'Task deleted successfully');
    }

    /*
    *     ADITIONAL METHODS 
    */

    /**
     * check if Task has been done and send E-Mail Notification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done($id)
    {
        $user= Auth::user();
        $todo = Task::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $NotData=[
            'hello'=>'Dear User,',
            'line1'=>'One task has been done',
            'check'=>'check the status here',
            'url'=>url('/home'),
            'line2'=>'Please check if the task is done correctly and delete it from the list. Thank You!',
            'status'=>'task finished'
        ];

        if($todo->completed == false){
            $todo->completed = true;
            Notification::send($user, new DoneNotification($NotData));
            
            $todo->save();
            return back()->with('success', 'well done');
        }else{
            return back();
        }
        
    }

    /**
     * Display the todo-list only in the children's section.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $todos = Task::where('user_id', Auth::user()->id)->orderBy('duration', 'asc')->get();
        return view('list_only', compact('todos'));
    }

    /**
     * check if parents password is correct
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkParent(Request $request)
    {
        if (Hash::check($request->get('parents_password'), auth()->user()->parents_password)){
            Session::put('is_parent_logged_in', 1);

            return redirect()->route('home.index');
        }

        return back()->withErrors(['Please enter the correct password or contact us']);    
    }

    /**
     * logout of parent's section
     *
     * @return \Illuminate\Http\Response
     */
    public function exitParentSection()
    {
        Session::remove('is_parent_logged_in');
        return redirect()->route('list')->with('success', 'You successfully exited from the parents section');
    }


    
}
