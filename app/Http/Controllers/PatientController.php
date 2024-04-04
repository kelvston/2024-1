<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::OrderBy('FirstName')->paginate(10);
        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  // 'user_id', 'firstName', 'MiddleName', 'LastName', 'BirthDate', 'address', 'occupation',
        //'phone
        $a = request()->validate([
            'firstName' => 'required',
            'MiddleName' => 'required',
            'LastName' => 'required',
            'birthDate' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'phone' => 'required |unique:Patients,phone,except,id',

        ]);
        $aa = User::all();
        $a['user_id'] = auth()->id();
        Patient::create($a);
        return redirect()->route('patients.index')->with('success', '.pattient registered successfully.');
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
        //
    }
}
