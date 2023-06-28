@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Assign Subunit to Truck</h1>

        <form action="{{ route('trucks.storeSubunit', ['truck' => $truck->id]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="subunit_id">Select Subunit Truck:</label>
                <select name="subunit_id" id="subunit_id" class="form-control">
                    @foreach ($trucks as $subunit)
                        <option value="{{ $subunit->id }}">{{ $subunit->unit_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Assign Subunit</button>
        </form>
    </div>
@endsection
