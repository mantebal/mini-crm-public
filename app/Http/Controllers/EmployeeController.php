<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('employee.index')->with(['employees' => Employee::all(), 'companies' => Company::all()]);
    }

    public function create(): View
    {
        return view('employee.create')->with('companies', Company::all());
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        $employee = Employee::create($request->all());

        return redirect(route('employee.show', $employee->id));
    }

    public function show(Employee $employee): View
    {
        return view('employee.show')->with('employee', $employee);
    }

    public function edit(Employee $employee): View
    {
        return view('employee.edit')->with(['employee' => $employee, 'companies' => Company::all()]);
    }

    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->all());

        return redirect(route('employee.show', $employee->id));
    }

    public function destroy (Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect(route('employee.index'));
    }
}
