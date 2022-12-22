@extends('base')

@section('content')
    
  @foreach ($notes as $note)
      <div class="note">
        <h2 class="note__title">{{ $note->title }}</h2>
        <p class="note__body">{{ $note->body }}</p>
      </div>
  @endforeach

@endsection