@if (session()->has("message"))
    <div x-data="{'show': true}" class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-laravel text-white px-48 py-3" x-init="setTimeout(() => show = false, 5000)" x-show="show" {{ $attributes->merge(['class' => 'contact-form']) }}>
      <p class="flash text-center" style="background-color: {{ session('bgColor')}}">{{ session("message") }}</p>
    </div>
@endif