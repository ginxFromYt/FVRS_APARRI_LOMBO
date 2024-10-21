<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Feedbacks;
use Gate;
use DB;
use Auth;

class CTRLFeedbacks extends Controller
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
        return view('users.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Denies the gate if user does not have access
        if(Gate::denies('user-access')){
            return redirect('errors.403');
        }

        return view('users.report');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust validation rules for photo upload if necessary
            'name' => ['nullable', 'string', 'max:255'], // Changed 'required' to 'nullable'
            'information' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:20'],
        ]);
    
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = null;
        }
    
        // Create feedback instance
        $report = Feedbacks::create([
            'photo' => $photoPath,
            'name' => $request->name, // Include 'name' in creation
            'information' => $request->information,
            'contact_number' => $request->contact_number,
        ]);
    
        // Redirect back with success message
        return redirect()->route('users.myreports')->with('status', 'Report submitted successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show user's feedbacks.
     */
    public function myReports()
    {
    
        $myreports = Feedbacks::where('id', auth()->user()->id)->take(5)->get();
        
        $myreports = Feedbacks::all(); // Assuming your model is named Feedback and you want to fetch all feedbacks
    
        return view('users.myreports', ['myreports' => $myreports]);
    }
    

}
