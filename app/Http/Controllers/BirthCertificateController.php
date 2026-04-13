<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use Illuminate\Http\Request;

class BirthCertificateController extends Controller
{
    public function index()
    {
        $births = BirthCertificate::latest()->get();
        return view('births.index', compact('births'));
    }

    public function create()
    {
        return view('births.create');
    }

    public function store(Request $request)
    {
        BirthCertificate::create([
            'user_id' => auth()->id() ?? 1, // Tracks the staff member

            'registry_number' => $request->registry_number,

            // Child
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'type_of_birth' => $request->type_of_birth,

            // Mother
            'mother_first_name' => $request->mother_first_name,
            'mother_last_name' => $request->mother_last_name,
            'mother_citizenship' => $request->mother_citizenship,

            // Father
            'father_first_name' => $request->father_first_name,
            'father_last_name' => $request->father_last_name,
            'father_citizenship' => $request->father_citizenship,

            // Marriage
            'parents_marriage_date' => $request->parents_marriage_date,
            'parents_marriage_place' => $request->parents_marriage_place,

            // Attendant & Registration
            'attendant_type' => $request->attendant_type,
            'date_registered' => $request->date_registered,
        ]);

        return redirect()->route('births.index')->with('success', 'Birth Record Saved Successfully!');
    }
}
