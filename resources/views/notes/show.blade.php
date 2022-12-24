@extends('base')

@section('content')
    <section class="note__item section-default-padding">
      <h3 class="note__item--heading mb-3">{{$note->title}}</h3>
      <p class="note__item--body">{{$note->body}}</p>
      <p class="note__item--created">Created at: <span>{{$note->created_at->format("H:i")}} [{{$note->created_at->format('d M, Y')}}]</span></p>

      <div class="note__buttons d-flex justify-content-center mx-auto mt-3">
        <form action={{route("notes.edit", ['note' => $note->id])}} class="note__edit mr-4">
          @csrf
          @method("put")
          <button class="note__edit--submit"><i class="fa-solid fa-pen"></i></button>
        </form>

        <form action={{route("notes.delete", ['note' => $note->id])}} class="note__delete" method="POST">
          @csrf
          @method('delete')
          <button class="note__delete--submit"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </section>
@endsection