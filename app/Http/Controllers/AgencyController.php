<?php

namespace App\Http\Controllers;

use App\Http\Requests\FromRequest_Agency;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencys = Agency::all();
        return view('agencys.list', compact('agencys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencys = Agency::all();
        return view('agencys.create', compact('agencys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FromRequest_Agency $request)
    {
        $agency = new Agency();
        $agency->agent_number = $request->input('agent_number');
        $agency->name = $request->input('name');
        $agency->phone = $request->input('phone');
        $agency->email = $request->input('email');
        $agency->address = $request->input('address');
        $agency->manager_name = $request->input('manager_name');
        $agency->status = $request->input('status');
        $agency->save();
        return redirect()->route('agencys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
//    public function show(Agency $agency)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::findOrFail($id);

        return view('agencys.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::findOrFail($id);
        $agency->agent_number = $request->input('agent_number');
        $agency->name = $request->input('name');
        $agency->phone = $request->input('phone');
        $agency->email = $request->input('email');
        $agency->address = $request->input('address');
        $agency->manager_name = $request->input('manager_name');
        $agency->status = $request->input('status');
        $agency->save();
        return redirect()->route('agencys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return redirect()->route('agencys.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $agencys = Agency::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(10);
        return view("agencys.list", compact('agencys'));
    }
}
