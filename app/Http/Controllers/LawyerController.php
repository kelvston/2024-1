<?php
namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    // Show the performance of lawyers
    public function performance()
    {
        $lawyers = Lawyer::withCount('cases')->get();  // Get lawyers with their case counts

        // Calculate performance data (e.g., win rate)
        $performanceData = $lawyers->map(function($lawyer) {
            $totalCases = $lawyer->cases_count;
            $wonCases = $lawyer->cases->where('status', 'won')->count();  // Assuming status is 'won' or 'lost'
            $winRate = $totalCases ? ($wonCases / $totalCases) * 100 : 0;

            return [
                'name' => $lawyer->name,
                'cases_handled' => $totalCases,
                'cases_won' => $wonCases,
                'win_rate' => round($winRate, 2),
            ];
        });

        return view('admin.lawyers.performance', compact('performanceData'));
    }
}
