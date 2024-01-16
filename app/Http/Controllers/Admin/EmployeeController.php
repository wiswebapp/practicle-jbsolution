<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployee;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee', [
            'data' => Employee::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.employee_alter', [
            'action' => 'Add',
            'companyData' => Company::all(),
            'formUrl' => route('admin.employee.store')
        ]);
    }

    public function store(CreateEmployee $request)
    {
        Employee::create($request->validated());
        return redirect(route('admin.employee.index'))->with('success', 'Data has been added successfully !');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee_alter', [
            'action' => 'Edit',
            'data' => $employee,
            'formUrl' => route('admin.employee.update', $employee)
        ]);
    }

    public function update(CreateEmployee $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect(route('admin.employee.index'))->with('success', 'Data has been updated successfully !');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('admin.employee.index'))->with('success', 'Data has been removed successfully !');
    }
}
