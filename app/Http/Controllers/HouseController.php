<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;


class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $user_auth = Auth::user();
        if($user_auth->role_id==1)
        {
        $tasks = Task::where('is_active','=',1)->latest()->paginate(10);
        //$taskss = DB::table('tasks')->where('user_id', 1)->count();
	    return view('house.index',compact('tasks'));
        }
        else
        {
            return redirect('/tasks')->with('admin is not!');
        }
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
    public function destroy($id)
    {
       $tasks = Taks::find('id');
       $user = Auth::user();
       if($user->role_id==1)
       {
       $tasks->delete();
       return redirect('\house')->with('success','Stock has been deleted');
       }

       else
       {
           return view('\house.index')->with('error','Sorry');
       }
    }
}