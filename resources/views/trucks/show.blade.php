@extends('layouts.app')

@section('content')
    <h1>Truck Details</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>Unit Number</th>
                <td>{{ $truck->unit_number }}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{ $truck->year }}</td>
            </tr>
            <tr>
                <th>Notes</th>
                <td>{{ $truck->notes }}</td>
            </tr>
        </tbody>
    </table>

    <hr>

    <h2>Subunit Trucks</h2>

    <!-- Subunit trucks table -->
    @if ($truck->mainTruckSubunits !== null && $truck->mainTruckSubunits->count() > 0)
        <table class="table">
            <tr>
                <th>Unit Number</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            @foreach ($truck->mainTruckSubunits as $subunit)
                <tr>
                    <td>{{ $subunit->subunit->unit_number }}</td>
                    <td>{{ $subunit->start_date }}</td>
                    <td>{{ $subunit->end_date }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No subunit trucks assigned.</p>
    @endif

    <hr>

    <h2>Add Subunit Truck</h2>

    <!-- Add subunit form -->
    <form action="{{ route('trucks.storeSubunit', $truck->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subunit_id">Subunit Truck</label>
            <select name="subunit_id" id="subunit_id" class="form-control">
                <option value="">Select a subunit truck</option>
                @foreach ($trucks as $subunitTruck)
                    @if ($subunitTruck->id !== $truck->id)
                        <option value="{{ $subunitTruck->id }}">{{ $subunitTruck->unit_number }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Subunit Truck</button>
    </form>

    <a href="{{ route('trucks.index') }}" class="btn btn-secondary mt-3">Back to Main Page</a>
@endsection
