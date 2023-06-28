@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Truck</h2>
        <form action="{{ route('trucks.update', $truck->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="unit_number">Number:</label>
                <input type="text" class="form-control" id="unit_number" name="unit_number" value="{{ $truck->unit_number }}">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $truck->year }}">
            </div>
            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea class="form-control" id="notes" name="notes">{{ $truck->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
