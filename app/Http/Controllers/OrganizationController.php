<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Organization;
use Illuminate\Support\Facades\Auth;
class OrganizationController extends Controller
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
        $organizations = Organization::orderBy('name')->paginate(10);
        //$orgs = Organization::all();
        $user = Auth::user();
        //dump($user);
        if($user->user_type == 'admin')
        {
        return view('organizations.index', compact('organizations','user'));
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
        $organizations = Organization::all();
        return view('organizations.create', compact('organizations'));
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
        $organizations = new Organization ([
            'name' => $request->get('name')
        ]);
        $organizations->save();
        return redirect('/organizations')->with('success', 'Organization has been added');
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
        $organizations = Organization::find($id);
        return view('organizations.edit', compact('organizations'));
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
        $organizations = Organization::find($id);
        $organizations->name = $request->get('name');
        $organizations->save();
        return redirect('/organizations')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organizations = Organization::find($id);
        $organizations->delete();
        return redirect('/organizations')->with('success', 'Stock has been deleted');
    }
}