<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\Companies;

class EmployeesController extends Controller
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
        $Employees = Employees::paginate(10);
        return view('Employees.index', ['Employees' => $Employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Companies = Companies::all();
        return view('Employees.add', ['Companies' => $Companies]);
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
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|email|unique:employees',
            'companie_id' => 'required',
            'phone' => 'required',
        ]);

        $Employees = new Employees();
        $Employees->firstname = $request['firstname'];
        $Employees->lastname = $request['lastname'];
        $Employees->email = $request['email'];
        $Employees->companie_id = $request['companie_id'];
        $Employees->phone = $request['phone'];
        $Employees->save();
        session()->flash('success', 'Data Add Successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees, $id)
    {
        //
        $Employee = Employees::find($id);
        if ($Employee) {
            $Companies = Companies::all();
            return view('Employees.view', ['Employee' => $Employee, 'Companies' => $Companies]);
        } else {
            session()->flash('error', 'Data Not Found..');
            return redirect()->route('employee.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees, $id)
    {
        //
        $Employee = Employees::find($id);
        if ($Employee) {
            $Companies = Companies::all();
            return view('Employees.edit', ['Employee' => $Employee, 'Companies' => $Companies]);
        } else {
            session()->flash('error', 'Data Not Found..');
            return redirect()->route('employee.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees, $id)
    {
        //
        $request->validate([
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|email',
            'companie_id' => 'required',
            'phone' => 'required',
        ]);

        $Employees = Employees::find($id);
        $Employees->firstname = $request['firstname'];
        $Employees->lastname = $request['lastname'];
        $Employees->email = $request['email'];
        $Employees->companie_id = $request['companie_id'];
        $Employees->phone = $request['phone'];
        $Employees->save();
        session()->flash('success', 'Data Updated Successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees, $id)
    {
        //
        if ($id) {
            $Employees = Employees::find($id);
            $Employees =  $Employees->delete();

            if ($Employees) {
                session()->flash('success', 'Data Delete  Sucssesfully..');
                return redirect()->route('employee.index');
            } else {
                session()->flash('error', 'Somthing Went Wrong..!');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Data Not Found..!');
            return redirect()->back();
        }
    }
}
