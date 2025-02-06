@extends('layouts.admin')

@section('content')
    <h1>Case Assignments</h1>
    <a href="{{ route('case-assignments.create') }}" class="btn btn-primary">Create New Assignment</a>

    <table class="table">
        <thead>
        <tr>
            <th>Case</th>
            <th>Lawyer</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($assignments as $assignment)
            <tr>
                <td>{{ $assignment->case->name }}</td>
                <td>{{ $assignment->lawyer->name }}</td>
                <td>
                    <a href="{{ route('case-assignments.edit', $assignment) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
