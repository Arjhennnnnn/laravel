<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="text-decoration-none mt-1 me-3" href="/view/post/user">View Post</a>
    <a class="text-decoration-none mt-1 me-3" href="/supervisor">Supervisor View</a>
    <a class="text-decoration-none mt-1" href="/admin/post/create">Admin View</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <div class="d-flex">
        @auth
        <p class="me-2 pt-1">Welcome, {{ auth()->user()->name }} </p>
        @else
        <p>Guest</p>
        @endauth

        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-primary">Logout</button>
        </form>
      </div>
    </div>
  </div>
</nav>