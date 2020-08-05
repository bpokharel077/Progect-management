<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
        $companies =Company::where('user_id',Auth::user()->id)->get();
        return view('companies.index',['companies'=> $companies]);
     }
     return view('auth.login');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        if(Auth::check()){
            $company = Company::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'user_id'=>Auth::user()->id
            ]);
        if($company){
            return redirect()->route('companies.show',['company'=>$company->id])->
            with('success','company created successfully');
        }
        }
        return back()->withInput()->with('errors','Creating company error');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
       // $company =Company::where('id',$company->id)->first();
        $company =Company::find($company->id);
        return view('companies.show',['companies'=> $company]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
        $company =Company::find($company->id);
        return view('companies.edit',['companies'=> $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //save data
        $companyUpdate =company::where('id',$company->id)
                    ->update([
                            'name'=>$request->input('name'),
                             'description'=>$request->input('description'),
                    ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])
                                ->with('success','company updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //dd($company);
        $findCompany = Company::find( $company->id);
        if($findCompany->delete()){
                return redirect()->route('companies.index')->
                    with('success','Company deleted successfully');
        }
        return back()->withInput()->with('error','Company couldnot be deleted');
    }
}
