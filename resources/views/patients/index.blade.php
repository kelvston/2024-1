@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary ml-lg-3" href="{{ route('patients.create') }}"> add patient</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>date of Birth</th>
            <th>phone Number</th>
            <th>registered by</th>
            <th width="auto">Action</th>
        </tr>
        <?php
        $i = 0;
        ?>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $patient->firstName }}</td>
                <td>{{ $patient->LastName }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->birthDate }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->email }}</td>
                <td>
                    <form action="{{ route('products.destroy', $patient->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('patients.show', $patient->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('patients.edit', $patient->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
