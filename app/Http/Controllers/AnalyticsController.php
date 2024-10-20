<?php

namespace App\Http\Controllers;

use App\Models\RecordViolation;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{

    public function dashboard()
    {
        $monthlyViolationsCount = RecordViolation::whereMonth('date_of_violation', now()->month)
            ->whereYear('date_of_violation', now()->year)
            ->count();

        $yearlyViolationsCount = RecordViolation::whereYear('date_of_violation', now()->year)->count();

        // You can also prepare the data for the graph
        $monthlyViolationsData = RecordViolation::selectRaw('DAY(date_of_violation) as day, count(*) as count')
            ->whereMonth('date_of_violation', now()->month)
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $yearlyViolationsData = RecordViolation::selectRaw('MONTH(date_of_violation) as month, count(*) as count')
            ->whereYear('date_of_violation', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact('monthlyViolationsCount', 'yearlyViolationsCount', 'monthlyViolationsData', 'yearlyViolationsData'));
    }}



