<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required|unique:employees,id_karyawan',
            'nama' => 'required',
            'jabatan' => 'nullable',
            'departemen' => 'nullable',
            'email' => 'nullable|email|unique:employees,email',
            'nomor_telepon' => 'nullable',
            'alamat' => 'nullable',
            'tanggal_bergabung' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images/employees'), $fotoName);
            $validated['foto'] = 'images/employees/' . $fotoName;
        }

        Employee::create($validated);
        return redirect()->route('employee.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit(Employee $employee)
    {
        return view('backend.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required|unique:employees,id_karyawan,' . $employee->id,
            'nama' => 'required',
            'jabatan' => 'nullable',
            'departemen' => 'nullable',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'nullable',
            'alamat' => 'nullable',
            'tanggal_bergabung' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($employee->foto && file_exists(public_path($employee->foto))) {
                unlink(public_path($employee->foto));
            }
            
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images/employees'), $fotoName);
            $validated['foto'] = 'images/employees/' . $fotoName;
        }

        $employee->update($validated);
        return redirect()->route('employee.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->foto && file_exists(public_path($employee->foto))) {
            unlink(public_path($employee->foto));
        }
        
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
