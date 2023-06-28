@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Trucks</h2>
        <a class="btn btn-success mb-3" href="{{ route('trucks.create') }}">Create Truck</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Year</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trucks as $truck)
                    <tr>
                        <td>{{ $truck->unit_number }}</td>
                        <td>{{ $truck->year }}</td>
                        <td>{{ $truck->notes }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a class="btn btn-info" href="{{ route('trucks.show', $truck->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('trucks.edit', $truck->id) }}">Edit</a>
                                <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
