<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\TurnoverReceipt;

class TurnoverReceiptController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'report_id' => 'required|exists:reports,id',
            'municipal_agriculturist' => 'required|string',
            'date_of_violation' => 'required|date',
            'time_of_violation' => 'required',
            'name_of_violation' => 'required|string',
            'name_of_skipper' => 'required|string',
            'name_of_banca' => 'required|string',
            'investigator_pnco' => 'required|string',
        ]);
    
        // Check if a TurnoverReceipt already exists for the given report_id
        $existingTurnoverReceipt = TurnoverReceipt::where('report_id', $request->report_id)->first();
    
        if ($existingTurnoverReceipt) {
            // If a TurnoverReceipt already exists, flash an error message and return
            return redirect()->back()->withErrors('A Turnover Receipt has already been submitted for this report.');
        }
    
        // Proceed with storing the new TurnoverReceipt
        $validatedData['report_id'] = $request->input('report_id');
        TurnoverReceipt::create($validatedData);
    
        // Redirect with success message
        return redirect()->route('users.myreports')->with('success', 'Turnover Receipt submitted successfully.');
    }
    
    public function show()
    {
        $receipts = TurnoverReceipt::all();
        return view('users.display_turnover_receipt', compact('receipts'));
    }
}

