<?php

namespace App\Http\Controllers\Admin;
use App\Models\Users\Feedbacks;
use App\Models\Report;
use App\Models\RecordViolation;
use App\Models\Violator;
use App\Models\Referral;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Gate;
use DB;

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
        $reports = Report::all();
    
        // Pass the reports to the view
        return view('admin.report', ['myreports' => $reports]);
    }
    

    public function viewedReports()
    {
        $viewedReports = Report::where('viewed', true)->get();

        return view('admin.viewed_reports', compact('viewedReports'));
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
    $referrals = Referral::all(); // Fetch all referrals

    return view('admin.referrals', compact('referrals'));
}
// public function dashboard()
// {
    
//     // Pass the variables to the view
//     return view('admin.dashboard', compact('totalViolations', 'barangaysWithViolators', 'monthlyCounts', 'months'));
// }




public function showRegisterForm()
{
    return view('auth.register'); // This should match the location of your Blade template
}

public function register(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    // Create the new user
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // Hash the password
    ]);

    // Redirect back with a success message
    return redirect()->route('admin.users.index')->with('success', 'User registered successfully.');
}




}
