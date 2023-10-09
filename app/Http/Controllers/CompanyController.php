<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index')->with('companies', Company::all());
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:' . Company::class,
            'email' => 'nullable|string|email|max:255',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'nullable|url|max:255',
        ]);

        $path = 'images/';
        $publicPath = public_path('images/');
        if(
            !is_dir($publicPath)
            && !mkdir($publicPath, 0777, true)
            && !is_dir($publicPath)
        ) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $publicPath));
        }

        $imageName = time() . '.' . $request->logo_url->extension();
        $request->logo_url->move($publicPath, $imageName);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo_url' => $path . $imageName,
            'website' => $request->website,
        ]);

        $request->session()->flash('status', 'Company was created.');
        return redirect('/company');
    }

    public function show(string $id)
    {
        return view('company.show')->with('company', Company::findOrFail($id));
    }

    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'nullable|string|email|max:255',
            'logo_url' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $company = Company::find($id);
        $company->update($request->all());
        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully.');
    }

    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('company.index')->with('success', 'Company deleted successfully');
    }
}
