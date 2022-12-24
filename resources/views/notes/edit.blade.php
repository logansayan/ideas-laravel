@extends('base')

@section('content')
<section class="add section-default-padding">
  <h1 class="add__heading mb-3">Add Idea</h1>

  <form action={{route("notes.update", ["note" => $note->id])}} class="add__form mx-auto" method="POST">
    @csrf
    @method('put')
    <input type="text" name="title" class="add__form--input d-block mx-auto mb-2" placeholder="Heading" value="{{$note->title}}">
    <textarea name="body" class="add__form--input d-block mx-auto" placeholder="Text goes here..">{{$note->body}}</textarea>

    <div class="add__buttons">
      <a href="{{url()->previous()}}" class="add__buttons--back"><i class="fa-solid fa-angle-left"></i></a>
      <button class="add__form--submit ml-auto text-center"><i class="fa-solid fa-check"></i></button>
    </div>
  </form>
</section>
@endsection