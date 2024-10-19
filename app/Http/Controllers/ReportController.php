<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\UserReport;
use App\Models\Referral;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all reports
        $reports = Report::all();
        
        // Return view with reports data
        return view('reports.myreports', ['myreports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.report');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nameofbanca' => ['required', 'string', 'max:255'],
            'nameofskipper' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'educationalbackground' => ['nullable', 'string', 'max:255'],
            'resident' => ['nullable', 'string', 'max:255'],
            'violation' => ['nullable', 'string', 'max:255'],
            'engine' => ['required', 'string', 'max:255'],
            'engineno' => ['required', 'string', 'max:255'],
            'gridcoordinate' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
        ]);

        // Assign default values to optional fields if they are not present
        $validatedData['resident'] = $validatedData['resident'] ?? null;
        $validatedData['violation'] = $validatedData['violation'] ?? null;
        $validatedData['status'] = $validatedData['status'] ?? null;
        $validatedData['educationalbackground'] = $validatedData['educationalbackground'] ?? null;
     
        // Create a new report instance and save it to the database
        $report = new Report();
        $report->nameofbanca = $validatedData['nameofbanca'];
        $report->nameofskipper = $validatedData['nameofskipper'];
        $report->age = $validatedData['age'];
        $report->birthdate = $validatedData['birthdate'];
        $report->status = $validatedData['status'];
        $report->educationalbackground = $validatedData['educationalbackground'];
        $report->resident = $validatedData['resident'];
        $report->violation = $validatedData['violation'];
        $report->engine = $validatedData['engine'];
        $report->engineno = $validatedData['engineno'];
        $report->gridcoordinate = $validatedData['gridcoordinate'];
        $report->amount = $validatedData['amount'];
        $report->save();
     
        // Redirect to the 'myreports' route after storing
        return redirect()->route('users.myreports');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::findOrFail($id); // Find the report by its id
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        // Show the edit form for a specific report
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        // Validate the incoming request data for updating
        $validatedData = $request->validate([
            'nameofbanca' => ['required', 'string', 'max:255'],
            'nameofskipper' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'educationalbackground' => ['nullable', 'string', 'max:255'],
            'resident' => ['nullable', 'string', 'max:255'],
            'violation' => ['nullable', 'string', 'max:255'],
            'engine' => ['required', 'string', 'max:255'],
            'engineno' => ['required', 'string', 'max:255'],
            'gridcoordinate' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
        ]);

        // Assign default values to optional fields if they are not present
        $validatedData['resident'] = $validatedData['resident'] ?? null;
        $validatedData['violation'] = $validatedData['violation'] ?? null;
        $validatedData['status'] = $validatedData['status'] ?? null;
        $validatedData['educationalbackground'] = $validatedData['educationalbackground'] ?? null;

        // Update the report instance with new data
        $report->nameofbanca = $validatedData['nameofbanca'];
        $report->nameofskipper = $validatedData['nameofskipper'];
        $report->age = $validatedData['age'];
        $report->birthdate = $validatedData['birthdate'];
        $report->status = $validatedData['status'];
        $report->educationalbackground = $validatedData['educationalbackground'];
        $report->resident = $validatedData['resident'];
        $report->violation = $validatedData['violation'];
        $report->engine = $validatedData['engine'];
        $report->engineno = $validatedData['engineno'];
        $report->gridcoordinate = $validatedData['gridcoordinate'];
        $report->amount = $validatedData['amount'];
        
        
        $report->save();

        // Redirect to the 'myreports' route after updating
        return redirect()->route('users.myreports');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        // Delete the report from the database
        $report->delete();

        // Redirect to the 'myreports' route after deleting
        return redirect()->route('users.myreports');
    }

    /**
     * Display a listing of the resource for authenticated users.
     */
    public function myreports()
    {
        $myreports = Report::all(); // Retrieve all reports from the database
    
        return view('users.myreports', compact('myreports'));
    }

    public function addReferral($id)
    {
        $report = Report::findOrFail($id);
        return view('users.referral', compact('report'));
    }
    

    public function getReferralDetails($id)
    {
        $referral = Referral::findOrFail($id); // Fetch the referral by its ID
        return view('partials.referral_details', compact('referral'))->render(); // Render the partial view
    }

    public function storeReferral(Request $request)
{
    // Validate the request data
    $request->validate([
        'report_id' => 'required|exists:reports,id',
        'date' => 'required|date',
        'time' => 'required',
        'date_of_violation' => 'required|date',
        'location' => 'required|string|max:255',
        'complainant' => 'required|string|max:255',
        'piece_of_evidence' => 'required|string',
    ]);

    // Fetch the report
    $report = Report::find($request->report_id);

    // Create a new Referral instance and store it in the database
    Referral::create([
        'report_id' => $request->report_id,
        'date' => $request->date,
        'violation' => $report->violation,  // Fetch the violation from the spot report
        'time' => $request->time,
        'date_of_violation' => $request->date_of_violation,
        'location' => $request->location,
        'complainant' => $request->complainant,
        'violator' => $report->nameofskipper,  // Fetch the name of the skipper
        'piece_of_evidence' => $request->piece_of_evidence,
    ]);

    // Redirect back to the reports list or any other appropriate location
    return redirect()->route('users.myreports')->with('success', 'Referral added successfully!');
}


    public function userReports()
    {
        // Fetch all user reports from the database
        $userReports = UserReport::all();
        
        // Get the count of user reports
        $reportCount = $userReports->count();
        
        // Return the view with user reports data and count
        return view('report.userreports', [
            'userreports' => $userReports,
            'reportCount' => $reportCount,
        ]);
    }
    
    public function showUserReport($id)
    {
        $report = Report::findOrFail($id); // Fetch the report or show a 404 error
        return view('report.view', compact('report')); // Return the show view with the report data
    }
  
    public function showTurnoverReceiptForm($id)
    {
        $report = Report::findOrFail($id);
        // Pass any additional data if necessary
        return view('users.turnover_receipt', compact('report'));
    }

    public function submitTurnoverReceipt(Request $request)
{
    $request->validate([
        'municipal_agriculturist' => 'required|string|max:255',
        'date_of_violation' => 'required|date',
        'time_of_violation' => 'required|date_format:H:i', // Time format (HH:MM)
        'name_of_violation' => 'required|string|max:255',
        'investigator_pnco' => 'required|string|max:255',
    ]);
    

    // Process the data (e.g., save to database)

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Turnover Receipt submitted successfully.');
}

public function showDisplayTurnoverReceipt(Request $request)
{
    // Fetch the data to display in the turnover receipt
    $turnoverData = (object) [
        'municipal_agriculturist' => $request->municipal_agriculturist,
        'date_of_violation' => $request->date_of_violation,
        'time_of_violation' => $request->time_of_violation,
        'name_of_violation' => $request->name_of_violation,
        'name_of_skipper' => $request->name_of_skipper,
        'name_of_banca' => $request->name_of_banca,
        'investigator_pnco' => $request->investigator_pnco,
    ];

    return view('users.display_turnover_receipt', compact('turnoverData'));
}



}
