<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
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
        //
        $Companies = Companies::paginate(10);
        return view('Companies.index', ['Companies' => $Companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Companies.add');
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
            'name' => 'required|max:20',
            'email' => 'required|email|unique:companies',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $Companies = new Companies();
        $Companies->name = $request['name'];
        $Companies->email = $request['email'];
        $Companies->website = $request['website'];
        if ($request->logo) {
            $folderPath = public_path('assets/Companies/Logo/' . $Companies->id . '/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('logo');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $Companies->logo = 'assets/Companies/Logo/' . $Companies->id . '/' . $imageName;
        }
        $Companies->save();
        session()->flash('success', 'Data Add Successfully');
        return redirect()->route('companie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies, $id)
    {
        $Companie = Companies::find($id);
        if ($Companie) {
            return view('Companies.view', ['Companie' => $Companie]);
        } else {
            session()->flash('error', 'Data Not Found..');
            return redirect()->route('companie.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies, $id)
    {
        //
        $Companie = Companies::find($id);
        if ($Companie) {
            return view('Companies.edit', ['Companie' => $Companie]);
        } else {
            session()->flash('error', 'Data Not Found..');
            return redirect()->route('companie.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'website' => 'required|url',
            'logo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $Companies = Companies::find($id);
        $Companies->name = $request['name'];
        $Companies->email = $request['email'];
        $Companies->website = $request['website'];
        if ($request->logo) {
            $folderPath = public_path('assets/Companies/Logo/' . $Companies->id . '/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('logo');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $Companies->logo = 'assets/Companies/Logo/' . $Companies->id . '/' . $imageName;
        }
        $Companies->save();
        session()->flash('success', 'Data Updated Successfully');
        return redirect()->route('companie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies, $id)
    {
        //
        if ($id) {
            $Companies = Companies::find($id);
            $Companies =  $Companies->delete();

            if ($Companies) {
                session()->flash('success', 'Data Delete  Sucssesfully..');
                return redirect()->route('companie.index');
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
