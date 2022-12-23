@extends('base')

@section('content')
    <section class="note__item section-default-padding">
      <h3 class="note__item--heading mb-3">{{$note->title}}</h3>
      <p class="note__item--body">{{$note->body}}</p>
      <p class="note__item--created">Created at: <span>{{$note->created_at->format("H:i")}} [{{$note->created_at->format('d M, Y')}}]</span></p>
    </section>
@endsection