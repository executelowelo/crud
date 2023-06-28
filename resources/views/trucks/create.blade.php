<!-- resources/views/trucks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Truck</h1>

        <form action="{{ route('trucks.store') }}" method="POST">
            @csrf

            <table class="table">
                <tr>
                    <th>Unit Number</th>
                    <td>
                        <input type="text" name="unit_number" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td>
                        <input type="number" name="year" class="form-control" min="1900" max="{{ date('Y') + 5 }}">
                    </td>
                </tr>
                <tr>
                    <th>Notes</th>
                    <td>
                        <textarea name="notes" class="form-control" rows="3"></textarea>
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-primary">Create Truck</button>
        </form>
    </div>
@endsection

