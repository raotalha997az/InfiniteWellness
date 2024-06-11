<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FunctionalMedicine;
use App\Models\Patient;

class FunctionalMedicineController extends Controller
{
    public function index()
    {
        $FunctionalMedicine = FunctionalMedicine::all();
        return view("functionalMedicine.index", compact("FunctionalMedicine"));
    }

    public function create()
    {
        $patients = Patient::all();
        return view("functionalMedicine.create", compact("patients"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'details' => 'required|string',
        ]);

        $functionalMedicine = FunctionalMedicine::create($request->all());

        flash('Functional Medicine created successfully')->success();
        return redirect()->route('functional-medicine.index');
    }

    public function show(FunctionalMedicine $functionalMedicine)
    {
        return view('functionalMedicine.show', compact('functionalMedicine'));
    }
}
