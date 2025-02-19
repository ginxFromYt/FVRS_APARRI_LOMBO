<?php

namespace App\Http\Controllers\Admin;
use App\Models\Users\Feedbacks;
use App\Models\Report;
use App\Models\Release;
use App\Models\RecordViolation;
use App\Models\Violator;
use App\Models\Referral;
use App\Models\TurnoverReceipt;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Logs;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        // denies the gate if
        if(Gate::denies('admin-access')){
            return redirect('errors.403');
        }
        $allusers = User::where('id','>=','3')->paginate(10); // get only records that start with id 3 and below
        // query using model eloquent
        return view('admin.users.index')
        ->with('allusers',$allusers);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
 * Show the form for editing the specified resource.
 */
public function edit(User $user)
{
    return view('admin.users.edit', ['user' => $user]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'extension' => 'nullable|string',
            'sex' => 'required|in:male,female',
            'address' => 'required|string',
        ]);

        // Update the user record with the validated data
        $user->update($validatedData);

        // Redirect back to the view page with a success message
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }




    public function usersReport()
    {
        // Fetch all reports
        $reports = Report::paginate(perPage:5);

        // Pass the reports to the view
        return view('admin.report', ['myreports' => $reports]);
    }


private function logAction($action, $description)
    {
        $user = auth()->user(); // Get the current user

        // Create a new log entry in the database
        Logs::create([
            'user_id' => $user->id,
            'action' => $action,
            'description' => $description
        ]);
    }
    public function showLogs()
{
      // Retrieve logs data from the database
      $logs = Logs::all(); // You may need to adjust this query based on your requirements

      // Pass logs data to the view
      return view('admin.logs', compact('logs'));
}


public function viewReferrals()
{
    $referrals = Referral::paginate(perPage:3);

    return view('admin.referrals', compact('referrals'));
}

public function viewturnoverreceipts()
{
    $turnoverreceipts = TurnoverReceipt::paginate(perPage:3);

    return view('admin.turnover-receipts', compact('turnoverreceipts'));
}


public function edits($encryptedId)
{
    try {
        // Decrypt the encrypted ID
        $id = decrypt($encryptedId);

        // Fetch the referral along with the associated report using the decrypted ID
        $referrals = Referral::with('report')->findOrFail($id);

        // Return the view with the referral data
        return view('violation.create', compact('referrals'));
    } catch (DecryptException $e) {
        // Handle invalid or tampered encryption
        abort(403, 'Unauthorized access.');
    }
}




public function showRegisterForm()
{
    return view('admin.register'); // This should match the location of your Blade template
}

public function register(Request $request)
{
    // $request->validate([
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
    // ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    // adds role to a newly registered user as user role
    $role = Role::select('id')->where('name','user')->first();
    $user->roles()->attach($role);


    return redirect()->back();
}



public function generateReferralPDF($encryptedId)
{
    try {
        // Decrypt the encrypted ID
        $id = decrypt($encryptedId);

        // Fetch the referral along with its associated report using the decrypted ID
        $data = Referral::with('report')->findOrFail($id);

        // Prepare data for the PDF
        $datas = [
            'data' => $data,
        ];

        // Load the view and pass the data to it for PDF generation
        $pdf = PDF::loadView('admin.referral-pdf', $datas);

        // Stream the PDF file
        return $pdf->stream('referral_report.pdf');
    } catch (DecryptException $e) {
        // Handle invalid or tampered encryption
        abort(403, 'Unauthorized access.');
    }
}






public function generateReportsPDF($encryptedId)
{
    try {
        // Decrypt the encrypted ID
        $id = decrypt($encryptedId);

        // Fetch the report along with its associated referrals using the decrypted ID
        $data = Report::with('referrals')->findOrFail($id);

        // Prepare data for the view
        $datas = [
            'data' => $data,
        ];

        // Load the view and pass data to generate the PDF
        $pdf = PDF::loadView('admin.reports-pdf', $datas);

        // Stream the PDF file
        return $pdf->stream('spot_report.pdf');
    } catch (DecryptException $e) {
        // Handle invalid or tampered encryption
        abort(403, 'Unauthorized access.');
    }
}




public function release($encryptedId)
{
    try {
        // Decrypt the encrypted ID
        $id = decrypt($encryptedId);

        // Fetch the report along with its associated referrals using the decrypted ID
        $report = Report::with('referrals')->findOrFail($id);
        $referral = $report->referrals->first();

        // Return the view with the report and referral data
        return view('admin.release', compact('report', 'referral'));
    } catch (DecryptException $e) {
        // Handle invalid or tampered encryption
        abort(403, 'Unauthorized access.');
    }
}

    public function storeRelease(Request $request, $id)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'skipper_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'violation' => 'required|string|max:255',
            'date_of_violation' => 'required|date',
            'time_of_violation' => 'required',
            'date_of_release' => 'required|date',
            'compensation' => 'nullable|string',
            'agricultural_technologist' => 'required|string|max:255',
            'municipal_agriculturist' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048', // Allow image uploads
        ]);
           // Check if a Release already exists for the given report_id
    $existingRelease = Release::where('report_id', $id)->first();

    if ($existingRelease) {
        // If a Release already exists, flash an error message and return
        return redirect()->back()->withErrors('A Release Paper Report has already been submitted for this report.');
    }

        // Create a new release record
        $release = new Release();
        $release->name_of_skipper = $validatedData['skipper_name'];
        $release->address = $validatedData['address'];
        $release->violation = $validatedData['violation'];
        $release->date_of_violation = $validatedData['date_of_violation'];
        $release->time_of_violation = $validatedData['time_of_violation'];
        $release->date_of_release = $validatedData['date_of_release'];
        $release->compensation = $validatedData['compensation'];
        $release->agricultural_technologist = $validatedData['agricultural_technologist'];
        $release->municipal_agriculturist = $validatedData['municipal_agriculturist'];
        $release->report_id = $id;

        // Save the photo if uploaded
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $release->photo = $path;
        }

        // Save the release record
        $release->save();

        // Redirect back with success message
          return redirect()->route('admin.report')->with('success', 'Release paper processed successfully.');
    }



    public function downloadReleasePdf($encryptedId)
    {
        try {
            // Decrypt the ID
            $id = Crypt::decrypt($encryptedId);

            // Fetch the releases based on the decrypted ID
            $releases = Release::where('report_id', $id)->get();

            // Generate the PDF
            $pdf = PDF::loadView('admin.releasespdf', compact('releases'));

            // Return the PDF as a stream
            return $pdf->stream('release_paper.pdf');
        } catch (\Exception $e) {
            // Handle invalid or tampered encryption
            abort(404, 'Invalid Release ID');
        }
    }





    public function generateReceiptPDF($encryptedId)
    {
        try {
            // Decrypt the encrypted ID
            $id = decrypt($encryptedId);

            // Fetch the receipt by decrypted ID
            $receipt = TurnoverReceipt::findOrFail($id);

            // Load the view with the receipt data
            $pdf = PDF::loadView('admin.receipt-pdf', compact('receipt'));

            // Stream the PDF to the browser
            return $pdf->stream('receipt.pdf');
        } catch (DecryptException $e) {
            // Handle invalid decryption or tampered data
            abort(403, 'Unauthorized access.');
        }
    }




}


