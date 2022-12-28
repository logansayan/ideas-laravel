<div class="nav mx-auto">
  <ul class="nav__links d-flex justify-content-between align-items-center">
  <li class="nav__logo"><a href="/" class="nav__link"><i class="fa-solid fa-circle-notch"></i>Ideas</a></li>
  

  @auth
    <li class="nav__link">
      <i class="fa-regular fa-user"></i> {{ auth()->user()->username }}
      <form action={{ route("users.logout") }} class="nav__logout d-inline ml-1" method="POST">
        @csrf
        <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 2rem"></i></button>
      </form>
    </li>
  @endauth
  </ul>
</div>