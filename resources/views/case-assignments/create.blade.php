@extends('layouts.admin')

@section('content')
    <h1>Create Case Assignment</h1>

    <form action="{{ route('case-assignments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="case_id">Case</label>
            <select name="case_id" id="case_id" class="form-control">
                @foreach ($cases as $case)
                    <option value="{{ $case->id }}">{{ $case->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lawyer_id">Lawyer</label>
            <select name="lawyer_id" id="lawyer_id" class="form-control">
                @foreach ($lawyers as $lawyer)
                    <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Case</button>
    </form>
@endsection
