<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CompaniesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompany;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validated();

        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extenstion = $file->getClientOriginalExtension();
            $newFilName = $this->generateFileName($extenstion);;
            $request->file('logo')->storeAs(
                'public', $newFilName
            );
            $validatedData['logo'] = $newFilName;
        }

        Company::create($validatedData);
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
        $validatedData = $request->validated();

        if($company->logo){
            $oldImage = storage_path('app/public/'. $company->logo);
            @unlink($oldImage);
        }

        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extenstion = $file->getClientOriginalExtension();
            $newFileName = $this->generateFileName($extenstion);
            $request->file('logo')->storeAs(
                'public/', $newFileName
            );
            $validatedData['logo'] = $newFileName;
        }

        $company->update($validatedData);
        return redirect(route('admin.company.index'))->with('success', 'Data has been updated successfully !');
    }

    public function destroy(Company $company)
    {
        Employee::where('company_id', $company->id)->delete();
        $company->delete();
        return redirect(route('admin.company.index'))->with('success', 'Data has been removed successfully !');
    }

    public function generateFileName($ext) {
        return uniqid(rand(), true) . '.' . $ext;
    }
}
