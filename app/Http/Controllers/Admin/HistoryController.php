<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\History;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;

class HistoryController extends Controller
{ 

    
    public function index()
    {
        // Fetch all history records
        $histories = History::paginate(perPage:5);

        // Return the view with the history records
        return view('admin.history', compact('histories'));
    }

    public function downloadHistoryPdf()
    {
        // Fetch the violation histories from the database
        $histories = History::all();  // Adjust according to your model and data retrieval method

        // Generate the PDF using the data
        $pdf = PDF::loadView('admin.historypdf', compact('histories'));

        // Return the generated PDF for download
        return $pdf->stream('violation_history.pdf');
    }
}

