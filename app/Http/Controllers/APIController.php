<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\JsonResponse;
use \Yajra\DataTables\Facades\DataTables;

class APIController extends Controller
{
    public function getCompanies(): JsonResponse
    {
        return DataTables::of(Company::all())
            ->addColumn('company_logo', function ($company) {
                return '<img src="'.$company->logo.'">';
            })
            ->addColumn('show', function($company) {
                return '<a href="'.route('company.show', $company->id) .'" class="btn btn-secondary">Show</a>';
            })
            ->rawColumns(['company_logo', 'show'])
            ->make(true);
    }

    public function getEmployees(): JsonResponse
    {
        return DataTables::of(Employee::all())
            ->addColumn('company_name', function($employee) {
                return $employee->company->name;
            })
            ->addColumn('show', function($employee) {
                return '<a href="'.route('employee.show', $employee->id) .'" class="btn btn-secondary">Show</a>';
            })
            ->rawColumns(['show'])
            ->make(true);
    }
}
