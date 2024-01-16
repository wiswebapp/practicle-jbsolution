<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CompaniesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompany;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(CompaniesDataTable $dataTable)
    {
        return $dataTable->render('admin.company');
    }

    public function create()
    {
        return view('admin.company_alter', [
            'action' => 'Add',
            'formUrl' => route('admin.company.store')
        ]);
    }

    public function store(CreateCompany $request)
    {
        Company::create($request->validated());
        return redirect(route('admin.company.index'))->with('success', 'Data has been added successfully !');
    }

    public function edit(Company $company)
    {
        return view('admin.company_alter', [
            'action' => 'Edit',
            'data' => $company,
            'formUrl' => route('admin.company.update', $company)
        ]);
    }

    public function update(CreateCompany $request, Company $company)
    {
        $company->update($request->validated());
        return redirect(route('admin.company.index'))->with('success', 'Data has been updated successfully !');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('admin.company.index'))->with('success', 'Data has been removed successfully !');
    }
}
