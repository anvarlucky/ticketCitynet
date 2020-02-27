<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrganizationController;
use App\Task;
use App\Organization;
use App\User;
use App\Department;
use App\Priority;
use App\Status;
use App\Comment;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TicketRequest;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:super_admin');
    }

    public function index()
    {
        //$count = Task::where('status_id'==1)->get();
        $tasks = Task::latest()->simplePaginate(20);
        $tasks2 = Task::get();
        $users = User::get();
        //dd($tasks2);
        $user_auth = Auth::user();
        $anvars = Auth::user()->tasks->where('is_active','=',1); //pokazovaet tiket kotoroe prenadlejit avtorizovonnogo polzovatelya
        //$tasks2 = Task::get();
        return view('tasks.index',['departments' => Department::get(), 'users' => User::get()], compact('tasks','users','tasks2','user_auth','anvars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = DB::table('organizations')->get();
        $users = DB::table('users')->where('role_id','=','2')->get();
        //dd($users);
        $works = DB::table('works')->get();
        $priorities = DB::table('priorities')->get();
        $statuses = DB::table('statuses')->get();
        $departments = DB::table('departments')->get();
        //$abs = DB::table('task_department')->get();
        $user_auth = Auth::user();
        if($user_auth->role_id==1)
        {
            //return view('tasks.create', compact('organizations','users','works','priorities','statuses','departments','abs'));
            return view('tasks.create',['departments' => Department::get(), 'users' => User::where('role_id','=','2')->get()], compact('organizations','users','works','priorities','statuses','departments'));
        }
        else
        {
            return redirect('/tasks')->with('Etot polzovatel ne admin!');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {

        //$tasks = Task::create($request->all());

        $task = Task::create($request->all());
        if($task){
            $task->departments()->attach($request->input('departments'));
            $task->users()->attach($request->input('users'));
        }
            return redirect('/tasks')->with('success', 'Task has been added');
        //departments o'zgardi
/*        if($request->input('departments')) :
            $task->departments()->attach($request->input('departments'));
        endif;

        if($request->input('users')) :
            $task->users()->attach($request->input('users'));
        endif;*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::find($id);
        //dd($tasks);
        $tasks2 = Task::where('id','=',$id)->get();
        $users = User::where('department_id','=',$tasks->department_id)->get();
        //dd($users);
        $statuses = Status::all();
        $comments = Comment::where('task_id','=',$tasks->id)->get();
        //dd($comments);
        $user_auth = Auth::user();
        $departments = Department::all();
        return view('tasks.show', ['departments' => Department::get(), 'users' => User::where('department_id','=',Auth::user()->department_id)->get()],compact('tasks','users','statuses','comments','user_auth','tasks2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_auth = Auth::user();
        if($user_auth->role_id==1)
        {
        $tasks = Task::find($id);
        $organizations = DB::table('organizations')->get();
        $users = DB::table('users')->where('role_id','=',2)->get();
        $departments = DB::table('departments')->get();
        $works = DB::table('works')->get();
        $priorities = DB::table('priorities')->get();
        $statuses = DB::table('statuses')->get();
        return view('tasks.edit',compact('tasks','organizations','users','works','priorities','statuses','departments'));
        }
        else
        {
            return redirect('/tasks');
        }
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
        $tasks = Task::find($id);
        $tasks->is_active=$request->input('is_active');
        $tasks->title=$request->input('title');
        $tasks->description=$request->input('description');
        $tasks->contacts = $request->input('contacts');
        $tasks->organization_id = $request->input('organization_id');
        $tasks->departments()->detach();
        if($request->input('departments')) :
            $tasks->departments()->attach($request->input('departments'));
        endif;
        $tasks->users()->detach();
        if($request->input('users')) :
            $tasks->users()->attach($request->input('users'));
        endif;
        $tasks->work_id = $request->input('work_id');
        $tasks->priority_id = $request->input('priority_id');
        $tasks->status_id = $request->input('status_id');
        $tasks->deadline = $request->input('deadline');
        $tasks->save();
        return redirect('tasks')->with('success','Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_auth = Auth::user();
        if($user_auth->role_id==1)
        {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/tasks')->with('success','Stock has been deleted');
        }
        else
        {
            return redirect('/tasks')->with('danger','Stock has been deleted');
        }
    }
}