<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{ 

    
    public function index()
    {
        // Fetch all history records
        $histories = History::paginate(perPage:5);

        // Return the view with the history records
        return view('admin.history', compact('histories'));
    }
}
