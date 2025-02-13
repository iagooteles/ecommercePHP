<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="150" src="/images/logo.png" alt="Ecommerce logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/all_products') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/comments') }}">Comentários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_cart') }}">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_order') }}">Compras</a>
                    </li>

                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <x-app-layout>
                            
                        </x-app-layout>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" id="login-btn" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>

                    @endauth

                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>