<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\RecordViolation;
use App\Models\Violator;
use App\Models\Referral;
use App\Models\Release;
use App\Models\History;
use Illuminate\Http\Request;

class RecordViolationController extends Controller

{



    // Method to show the create violation form
    public function recordviolation()
    {
        // Fetch all referrals to be displayed in the violation form
        $referrals = Referral::all();

        // Pass the referrals to the view
        return view('violation.create', compact('referrals')); // Adjust the view name if necessary
    }


    public function edits($id)
    {
        // Fetch all referrals to be displayed in the violation form
        $referrals = Referral::findOrFail($id);

        // Pass the referrals to the view
        return view('violation.create', compact('referrals')); // Adjust the view name if necessary
    }

    public function update(Request $request, $id)
    {
        $violation = RecordViolation::findOrFail($id);
        $violation->update($request->only(['violation', 'location', 'date_of_violation', 'time_of_violation']));
    
        // Update or create violators
        if ($request->has('violators')) {
            foreach ($request->violators as $violatorData) {
                // If there's an ID, update the violator
                if (isset($violatorData['id'])) {
                    $violator = Violator::findOrFail($violatorData['id']);
                    $violator->update($violatorData);
                } else {
                    // Create new violator if no ID is set (this part is optional based on your requirements)
                    $violation->violators()->create($violatorData);
                }
            }
        }
    
        return redirect()->route('violation.list')->with('success', 'Record updated successfully');
    }

    // Method to store the violation record
   public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'violation' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'date_of_violation' => 'required|date',
        'time_of_violation' => 'required|',
        'violators.*.violator' => 'required|string|max:255',
        'violators.*.sex' => 'required|string|in:Male,Female',
        'violators.*.address' => 'nullable|string|max:255',
    ]);

    // Create the record violation
    $recordViolation = RecordViolation::create([
        'violation' => $request->violation,
        'location' => $request->location,
        'date_of_violation' => $request->date_of_violation,
        'time_of_violation' => $request->time_of_violation,
    ]);

    // Save violators with the associated record violation ID
    foreach ($request->violators as $violatorData) {

        if (!empty($violatorData['violator'])) {
            $recordViolation->violators()->create(array_merge($violatorData, [
                'record_violations_id' => $recordViolation->id // Link the violator to the violation record
            ]));
        }
    }

    // Redirect to the list of violations with a success message
    return redirect()->route('violation.list')->with('success', 'Violation recorded successfully!');
}



    public function listviolation()
{
    // Fetch all violations with their associated violators
    $violations = RecordViolation::with('violators')->paginate(5);

    return view('violation.list', compact('violations'));

}

public function edit($id)
{
    $violation = RecordViolation::with('violators')->findOrFail($id);
    return view('violation.edit', compact('violation'));
}

public function search(Request $request)
{
    $query = $request->input('query');

    // Fetch violators with related record violations based on the search query, with pagination
    $violators = Violator::with('recordViolation')
        ->where('violator', 'LIKE', "%{$query}%")
        ->orWhere('address', 'LIKE', "%{$query}%")
        ->paginate(10);  // Change to paginate instead of get()

    return view('violation.search_results', compact('violators', 'query'));
}


public function finish($id)
{
    // Find the violation by ID
    $recordViolation = RecordViolation::with('violators')->findOrFail($id);

    $currentDate = now()->format('Y-m-d');
    $currentTime = now()->format('H:i:s');

    // Update the record's date and time to the current date and time
    $recordViolation->update([
        'date_of_violation' => $currentDate,
        'time_of_violation' => $currentTime,
    ]);

    // Check if there are violators associated with this record
    foreach ($recordViolation->violators as $violator) {
        // Create a history record for each violator
        History::create([
            'violation' => $recordViolation->violation,
            'location' => $recordViolation->location,
            'date_of_violation' => $currentDate,
        'time_of_violation' => $currentTime,
           'violator'=> $violator->violator,
            'sex' => $violator->sex,
            'address' => $violator->address,
        ]);
    }

    // Delete the violation
    $recordViolation->delete();

    // Redirect back with a success message
    return redirect()->route('admin.history')->with('success', 'Violation moved to history successfully.');
}

public function list()
    {
        // Fetch all violations
        $violations = RecordViolation::with('violators')->get();

        // Pass the violations to the view
        return view('violation.list', compact('violations'));
    }

    public function history()
{
    // Assuming you have a History model that corresponds to your history table
    $history = History::all(); // You can customize this as needed

    return view('admin.history', compact('history')); // Make sure to change 'admin.history' to your actual view
}
// Controller method to show barangays with violations
public function showBarangaysWithViolations()
{
    // Fetch distinct barangays with violations
    $barangays = Violator::select('address')->distinct()->get();

    return view('violation.barangays', compact('barangays'));
}


// Fetch violators for the specific barangay and count violations per violator

public function getViolatorsByBarangay($barangay)
{
    // Fetch all violators for the specific barangay
    $violators = Release::where('address', $barangay)
                        ->select('name_of_skipper', 'violation', 'compensation', 'address')
                        ->get();

    // Group violators by name_of_skipper
    $violatorsWithDetails = $violators->groupBy('name_of_skipper')->map(function ($group) {
        return [
            'name_of_skipper' => $group->first()->name_of_skipper,  // Name of the violator
            'violation_count' => $group->count(),                  // Count of violations
            'violations' => $group->map(function ($violation) {    // Map each violation with details
                return [
                    'violation' => $violation->violation,
                    'compensation' => $violation->compensation,
                ];
            })->toArray(),
        ];
    })->values();  // Reset keys to get a clean list

    // Return the data as a JSON response
    return response()->json($violatorsWithDetails);
}



}
