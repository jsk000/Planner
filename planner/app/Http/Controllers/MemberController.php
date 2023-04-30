<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DoneNotification;
use Illuminate\Support\Facades\Notification;

class MemberController extends Controller
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
        $members = Member::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();
        return view('members', compact('members'));
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
            'name'=> 'required|string',
        ]);
        
        $member = new Member;
        $member->name = $request->input('name');      
        $member->user_id = Auth::user()->id;

        $member->save();

        return back()->with('success', 'new Member added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('delete_member', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('edit_member', compact('member'));
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
            'name'=> 'required|string',
        ]);
        
        $member = Member::find($id);
        $member->name = $request->input('name');       

        $member->save();
        return redirect()->route('members.index')->with('success', 'Member has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }

    
}
