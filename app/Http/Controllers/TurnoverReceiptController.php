<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurnoverReceipt;

class TurnoverReceiptController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'municipal_agriculturist' => 'required|string',
            'date_of_violation' => 'required|date',
            'time_of_violation' => 'required',
            'name_of_violation' => 'required|string',
            'name_of_skipper' => 'required|string',
            'name_of_banca' => 'required|string',
            'investigator_pnco' => 'required|string',
        ]);

        TurnoverReceipt::create($validatedData);

        return redirect()->back()->with('success', 'Turnover Receipt created successfully.');
    }

    public function show()
    {
        $receipts = TurnoverReceipt::all();
        return view('users.display_turnover_receipt', compact('receipts'));
    }
}

