<?php
namespace App\Http\Controllers;

use App\Models\CaseAssignment;
use App\Models\Cases;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class CaseAssignmentController extends Controller
{
    // Show all case assignments
    public function index()
    {
        $assignments = CaseAssignment::all();
        return view('admin.case-assignments.index', compact('assignments'));
    }

    // Show the form to create a new case assignment
    public function create()
    {
        $cases = Cases::all();  // Fetch all cases
        $lawyers = Lawyer::all();  // Fetch all lawyers
        return view('admin.case-assignments.create', compact('cases', 'lawyers'));
    }

    // Store a newly created case assignment
    public function store(Request $request)
    {
        $request->validate([
            'case_id' => 'required|exists:cases,id',
            'lawyer_id' => 'required|exists:lawyers,id',
        ]);

        CaseAssignment::create([
            'case_id' => $request->case_id,
            'lawyer_id' => $request->lawyer_id,
        ]);

        return redirect()->route('case-assignments.index')->with('success', 'Case assignment created successfully!');
    }

    // Show the form to edit an existing case assignment
    public function edit(CaseAssignment $assignment)
    {
        $cases = Cases::all();  // Fetch all cases
        $lawyers = Lawyer::all();  // Fetch all lawyers
        return view('admin.case-assignments.edit', compact('assignment', 'cases', 'lawyers'));
    }

    // Update the specified case assignment
    public function update(Request $request, CaseAssignment $assignment)
    {
        $request->validate([
            'case_id' => 'required|exists:cases,id',
            'lawyer_id' => 'required|exists:lawyers,id',
        ]);

        $assignment->update([
            'case_id' => $request->case_id,
            'lawyer_id' => $request->lawyer_id,
        ]);

        return redirect()->route('case-assignments.index')->with('success', 'Case assignment updated successfully!');
    }
}
