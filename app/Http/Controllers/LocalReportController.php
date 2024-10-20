<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Http\Request;

class LocalReportController extends Controller
{
    // Show the report form
    public function showReportForm()
    {
        return view('report.form'); // Ensure the Blade file is located at resources/views/report/form.blade.php
    }

    // Store a new report
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'information' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the photo upload if it exists
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath; // Add the photo path to the validated data
        }

        // Store the report data in the database
        UserReport::create($validatedData);

        // Redirect to the welcome page with a success message
        return redirect()->route('welcome')->with('success', 'Report submitted successfully.');
    }





}
