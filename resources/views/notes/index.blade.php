@extends('base')

@section('content')

  <section class="notes section-default-padding">
    <h1 class="notes__heading section-heading">Your Ideas</h1>

    <div class="notes__container">
      @foreach ($notes as $note)
        <div class="note">
          <a href={{route("notes.show", ['note' => $note->id])}} class="note__link">
            <h2 class="note__title">{{(strlen($note->title) > 30) ? substr($note->title,0,30).'...' : $note->title}}</h2>
            <p class="note__body">{{(strlen($note->body) > 100) ? substr($note->body,0,100).'...' : $note->body}}</p>
            <p class="note__created text-italic text-right mt-1"><i class="fa-solid fa-clock"></i> {{$note->created_at->format("H:i")}}</p>
            </a>
        </div>
      @endforeach
    </div>

    <a href={{route("notes.add")}} class="notes__add text-center d-block mt-3 mx-auto"><i class="fa-solid fa-plus"></i></a>
  </section>
@endsection