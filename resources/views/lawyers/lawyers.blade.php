@extends('layouts.admin')

@section('content')
    <h1>Lawyer Performance</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Cases Handled</th>
            <th>Cases Won</th>
            <th>Win Rate (%)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($performanceData as $data)
            <tr>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['cases_handled'] }}</td>
                <td>{{ $data['cases_won'] }}</td>
                <td>{{ $data['win_rate'] }}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
