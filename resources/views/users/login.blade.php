@extends('base')

@section('content')
  <section class="auth section-default-padding">
    <h1 class="auth__heading mb-3">Login</h1>

    <form action={{route("users.authenticate")}} class="auth__form mx-auto" method="POST">
      @csrf

      <input type="text" name="username" class="auth__form--input d-block mx-auto mb-2" placeholder="Username" value="{{old('username')}}">
      @error('username')
          <p class="error-text">{{ $message }}</p>
      @enderror
      
      <input type="password" name="password" class="auth__form--input d-block mx-auto mb-2" placeholder="Password">
      @error('password')
          <p class="error-text">{{ $message }}</p>
      @enderror
      
      <div class="auth__buttons">
        <a href="{{ route('users.register') }}" class="auth__buttons--back">Don't have an account?</a>
        <button class="auth__form--submit ml-auto text-center">Login</button>
      </div>
    </form>
  </section>
@endsection