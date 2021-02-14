<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">Fantázia e-shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items') }}">Termékek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">Kosaram</a>
                </li>
            </ul>
            <span class="navbar-text">
            Ez a kosaras feladatom
      </span>
        </div>
    </div>
</nav>
