<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;


use App\Models\Report;
use App\Models\UserReport;
use App\Models\Referral;
use App\Models\Release;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

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
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nameofbanca' => ['required', 'string', 'max:255'],
            'nameofskipper' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'educationalbackground' => ['nullable', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
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
        $report->religion = $validatedData['religion'];
        $report->educationalbackground = $validatedData['educationalbackground'];
        $report->occupation = $validatedData['occupation'];
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
            'religion' => ['nullable', 'string', 'max:255'],
            'educationalbackground' => ['nullable', 'string', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],
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
    public function addReferral($encryptedId)
    {
        try {
            // Decrypt the encrypted ID
            $id = decrypt($encryptedId);

            // Fetch the report using the decrypted ID
            $report = Report::findOrFail($id);

            return view('users.referral', compact('report'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle cases where decryption fails
            abort(403, 'Unauthorized access.');
        }
    }



    public function storeReferral(Request $request)
    {
        // Fetch the report
        $report = Report::find($request->report_id);

        $imagePaths = [];

        // Check and store uploaded images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Generate a unique name for the image
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store the image in the 'public/evidence' folder
                $path = $image->storeAs('public/evidence', $imageName);

                // Save the relative path (removing 'public/' prefix for easier rendering)
                $imagePaths[] = str_replace('\\', '/', 'evidence/' . $imageName);


            }
        }

        // Create a new referral record
        Referral::create([
            'report_id' => $request->report_id,
            'date' => $request->date,
            'violation' => $report->violation,
            'time' => $request->time,
            'date_of_violation' => $request->date_of_violation,
            'location' => $request->location,
            'complainant' => $request->complainant,
            'investigator_pnco' => $request->investigator_pnco,
            'violator' => $report->nameofskipper,
            'piece_of_evidence' => $request->piece_of_evidence,
            'image' => $imagePaths, // Save the array directly (Laravel handles serialization)
        ]);

        // Redirect back with success message
        return redirect()->route('users.myreports')->with('success', 'Referral added successfully!');
    }


    public function userReports()
    {
        // Fetch all user reports from the database
        $userReports = UserReport::where('status', 'pending')->get();

        // Get the count of user reports
        $reportCount = $userReports->count();

        // Return the view with user reports data and count
        return view('report.userreports', [
            'userreports' => $userReports,
            'reportCount' => $reportCount,
        ]);
    }
    public function showTurnoverReceiptForm($encryptedId)
    {
        try {
            // Decrypt the encrypted ID
            $id = decrypt($encryptedId);

            // Fetch the report using the decrypted ID
            $report = Report::findOrFail($id);

            // Retrieve the first associated referral
            $referral = $report->referrals()->first();

            // Pass any additional data if necessary
            return view('users.turnover_receipt', compact('report', 'referral'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle invalid or tampered encryption
            abort(403, 'Unauthorized access.');
        }
    }



    //     public function submitTurnoverReceipt(Request $request)
// {
//     $request->validate([
//         'municipal_agriculturist' => 'required|string|max:255',
//         'date_of_violation' => 'required|date',
//         'time_of_violation' => 'required|date_format:H:i', // Time format (HH:MM)
//         'name_of_violation' => 'required|string|max:255',
//         'investigator_pnco' => 'required|string|max:255',
//     ]);

    //     return redirect()->route('users.myreports')->with('success', 'Turnover Receipt submitted successfully.');
// }





    public function showUserReport($id)
    {
        $report = Report::findOrFail($id); // Fetch the report or show a 404 error
        return view('report.view', compact('report')); // Return the show view with the report data
    }
    public function showresolved()
    {
        // fetch cancelled reports
        $data = UserReport::where('status', 'resolved')->get();

        // Redirect to the user reports list
        return view('report.resolved', compact('data'));
    }


    public function resolved()
    {
        // Update the report status to resolved
        $report = UserReport::find(request('id'));
        $report->status = 'resolved';
        $report->save();

        // Redirect to the user reports list
        return redirect()->back()->with('success', 'Report has been resolved successfully.');
    }

    public function cancelled()
    {
        // Update the report status to resolved
        $report = UserReport::find(request('id'));
        $report->status = 'cancelled';
        $report->save();

        // Redirect to the user reports list
        return redirect()->back()->with('success', 'Report has been resolved successfully.');
    }



    public function showcancelled()
    {
        // fetch cancelled reports
        $data = UserReport::where('status', 'cancelled')->get();

        // Redirect to the user reports list
        return view('report.cancelled', compact('data'));
    }


    public function releases()
    {
        // Fetch data from the 'releases' table
        $releases = Release::all(); // You can adjust this query to fit your needs (e.g., paginate, filter, etc.)

        // Return a view with the releases data
        return view('users.releases', compact('releases'));
    }

    public function generatePdf($encryptedId)
    {
        try {
            // Decrypt the encrypted ID
            $id = decrypt($encryptedId);

            // Fetch the release using the decrypted ID
            $releases = Release::where('id', $id)->get(); // Example: filtering by ID

            // Generate the PDF
            $pdf = PDF::loadView('users.releasepaperspdf', compact('releases'));

            // Stream the PDF file
            return $pdf->stream('releasepapers.pdf');
        } catch (DecryptException $e) {
            // Handle invalid or tampered encryption
            abort(403, 'Unauthorized access.');
        }
    }
}
