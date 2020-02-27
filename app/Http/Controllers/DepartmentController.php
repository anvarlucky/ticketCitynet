<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $departments = Department::orderBy('name')->paginate(10);
        $user_auth = Auth::user();
        if($user_auth->role_id==1){
        //$deps = DB::table('departments')->where('')->get();
        return view('departments.index',compact('departments','users'));
        }
        else
        {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('departments.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);
        $deps = new Department ();
        $deps->create($request->except('_token'));
        return redirect('/departments')->with('success', 'Departament has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departments = Department::find($id);
        $users = User::where('department_id','=',$departments->id)->get();
        return view('departments.show',compact('departments','users'));
    }

    public function register ()
    {
        $departments = Department::all();
        return view('auth.register',compact('departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::find($id);
        return view('departments.edit', compact('departments'));
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
        $request->validate([
            'name'=>'required'
        ]);
        $departments = Department::find($id);
        $departments->name = $request->get('name');
        $departments->save();
        return redirect('/departments')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departments = Department::find($id);
        $departments->delete();
        return redirect('/departments')->with('success','Stock has been deleted');
    }
}
