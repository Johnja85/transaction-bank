@extends('layout.master')

@section('content')
  
    @foreach ($posts as $post)
        <div class='box item'>
            <p>{{ $post }}</p>
        </div>
    @endforeach

    @forelse($posts as $post)
        <div class='box item'>
            <p>{{ $post }}</p>
        </div>
    @empty
        'No hay data'
    @endforelse

    {{ $name }}

    @if ()
        
    @endif
@endsection