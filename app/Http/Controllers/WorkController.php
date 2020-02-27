<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use App\Organization;
use App\Work;
use Illuminate\Support\Facades\Auth;
class WorkController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $works = Work::orderBy('type')->paginate(10);
        $user = Auth::user();
        if($user->user_type == 'admin')
        {
        return view('works.index', compact('works','user'));
        }
        else
        {
            return redirect('/')->with("bu admin emas!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $works = Work::all();
        return view('works.create', compact('works'));
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
           'type' => 'required',
        ]);
        $works = new Work ([
            'type' => $request->get('type')
        ]);
        $works->save();
        return redirect('/works')->with('success', 'Work has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works = Work::find($id);
        return view('works.edit', compact('works'));
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
            'type'=>'required'
        ]);
        $works = Work::find($id);
        $works->type = $request->get('type');
        $works->save();
        return redirect('/works')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works = Work::find($id);
        $works->delete();
        return redirect('/works')->with('success', 'Stock has been deleted');
    }

}