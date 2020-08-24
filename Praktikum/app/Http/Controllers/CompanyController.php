<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class CompanyController extends Controller
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
        $companys = Company::all();
        return view('companies.index', compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Company::Class);
        $request->validate([
            'company_name'=>'required|max:255',
            'employee_count'=>'required|numeric|min:0|max:500000',
            'image' => 'image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->resize(40, 40);
        $image->save();


        $company = new Company;
        $company->company_name = $request->company_name;
        $company->employee_count = $request->employee_count;
        $company->creator = $request->user()->user_id;
        $company->company_logo = $imagePath;
        $company->save();
        return redirect('/companies/')->with('success', 'Company saved!');
        //return response()->json($companies, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        return Company::find($company_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        $this->authorize('update',$company = Job::find($company_id));
        $company = Company::find($company_id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {

        $this->authorize('update',$company = Company::findOrFail($company_id));
        $company = Company::findOrFail($company_id);
        $company->update($request->all());
        return redirect('/companies/')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$company_id)
    {
        $this->authorize('delete', $company = Company::findOrFail($company_id));
        $company = Company::findOrFail($company_id);
        $company->delete();
        return redirect('/companies/')->with('success', 'Company deleted!');
    }
}
