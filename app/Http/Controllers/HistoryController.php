<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{ 
    public function index()
    {
        // Fetch all history records
        $histories = History::all();

        // Return the view with the history records
        return view('admin.history', compact('histories'));
    }
}
