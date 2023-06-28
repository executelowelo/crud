<!-- resources/views/trucks/subunits.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subunits for Truck: {{ $truck->unit_number }}</h1>

        @if ($subunits && count($subunits) > 0)
            <ul>
                @foreach ($subunits as $subunit)
                    <li>{{ $subunit->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No subunits found for this truck.</p>
        @endif

        <a href="{{ route('trucks.index') }}" class="btn btn-primary">Back to Trucks</a>
    </div>
@endsection
