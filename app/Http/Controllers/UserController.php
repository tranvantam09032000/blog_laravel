<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $user = User::paginate(7);
        $user = User::where('status','=', 1 )->paginate(7);
         return View('Admin.users.index',compact('user'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $user = User::findorfail($id);
    //     $user ->delete();
    //     return redirect()->back()->with('success','Xóa thành công!');
    // }

    public  function lock($id)
    {
        $user = User::findorfail($id);
        
        $user->status = 0;
        $user->save();

        return redirect()->back();
    }

    public function viewuserlock() 
    {
        $lstUserLock = User::where('status', false)->paginate(4);
        return view('Admin.user.userlock',compact('lstUserLock'));
        
    }

    public  function userlock($id)
    {
        $user = User::findorfail($id);
     
        $user->status = 1;
        $user->save();

        return redirect()->back();
    }
}
