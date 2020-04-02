<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('company.index');
    }

    public function create(): View
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request): RedirectResponse
    {
        $data = $request->all();

        if($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::create($data);

        return redirect(route('company.show', $company->id));
    }

    public function show(Company $company): View
    {
        return view('company.show')->with('company', $company);
    }

    public function edit(Company $company): View
    {
        return view('company.edit')->with('company', $company);
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->all();

        if($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect(route('company.show', $company->id));
    }

    public function destroy (Company $company): RedirectResponse
    {
        $company->delete();

        return redirect(route('company.index'));
    }
}
