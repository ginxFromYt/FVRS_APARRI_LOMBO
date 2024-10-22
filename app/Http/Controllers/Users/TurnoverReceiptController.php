<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\TurnoverReceipt;

class TurnoverReceiptController extends Controller
{
    public function store(Request $request)
    {
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

        $validatedData['report_id'] = $request->input('report_id');

        TurnoverReceipt::create($validatedData);
        

        return redirect()->route('users.myreports')->with('success', 'Turnover Receipt submitted successfully.');
    }

    public function show()
    {
        $receipts = TurnoverReceipt::all();
        return view('users.display_turnover_receipt', compact('receipts'));
    }
}

