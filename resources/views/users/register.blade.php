@extends('base')

@section('content')
  <section class="auth section-default-padding">
    <h1 class="auth__heading mb-3">Register</h1>

    <form action={{route("users.store")}} class="auth__form mx-auto" method="POST">
      @csrf
      <input type="text" name="username" class="auth__form--input d-block mx-auto mb-2" placeholder="Username (Ex: parzival)" value="{{old('username')}}">
      @error('username')
          <p class="error-text">{{ $message }}</p>
      @enderror

      <input type="text" name="email" class="auth__form--input d-block mx-auto mb-2" placeholder="Email" value="{{old('email')}}">
      @error('email')
          <p class="error-text">{{ $message }}</p>
      @enderror
      
      <input type="password" name="password" class="auth__form--input d-block mx-auto mb-2" placeholder="Password">
      @error('password')
          <p class="error-text">{{ $message }}</p>
      @enderror
      
      <input type="password" name="password_confirmation" class="auth__form--input d-block mx-auto mb-2" placeholder="Confirm password">
      @error('password_confirmation')
          <p class="error-text">{{ $message }}</p>
      @enderror
      

      <div class="auth__buttons">
        <a href="{{ route('users.login') }}" class="auth__buttons--back">Already have an account?</a>
        <button class="auth__form--submit ml-auto text-center">Create account</button>
      </div>
    </form>
  </section>
@endsection