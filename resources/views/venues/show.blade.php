@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">

    
    <h1>Venue Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $venue->name }}</h5>
            @if($venue->image)
            <img src="{{ asset('storage/' . $venue->image) }}" alt="Image" width="100">
            @else
                        No Image
                    @endif
            <p class="card-text"><strong>Address:</strong> {{ $venue->address }}</p>

            <p class="card-text"><strong>Capacity:</strong> {{ $venue->capacity }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $venue->description }}</p>
            <p class="card-text"><strong>Website:</strong> {{ $venue->website }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $venue->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $venue->email }}</p>
            <a href="{{ route('venuess.edit', $venue->id) }}" class="btn btn-warning">Edit Venue</a>

            <!-- Delete Button/Form -->
            <form method="POST" action="{{ route('venuess.destroy', $venue->id) }}" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this venue?')">Delete Venue</button>
            </form>
        </div>
    </div>
</div>
@endsection
