<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Ecommerce - PHP</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    @include('home.header')

    <div class="container">
        @if(session()->has('msg'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('msg') }}
        </div>
        @endif
    </div>

    <div class="row align-items-center product-container">

        <div class="col-12 col-md-6 img-container">
            <img src="/product/{{ $product->image }}" alt="" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-6 detail-box">
            <h2 class="font-weight-bold text-capitalize text-black" style="font-size: 2rem;">{{ $product->title }}</h2>
            @if($product->discount_price != null)
            <h5 class="text-danger mt-3" style="text-decoration: line-through; font-size: 0.9rem;">
                Preço: ${{ $product->price }}
            </h5>
            <h4 class="text-success mt-3">
                Preço com desconto: ${{ $product->discount_price }}
            </h4>
            @else
            <h4 class="text-dark mt-3">
                Preço: ${{ $product->price }}
            </h4>
            @endif

            <div class="mt-4 text-start">
                <h6 class="mt-3">
                    <strong>Categoria:</strong> {{ $product->category }}
                </h6>
                <h6>
                    <strong>Detalhes:</strong> {{ $product->description }}
                </h6>
                <h6>
                    <strong>Quantidade disponível:</strong> {{ $product->quantity }}
                </h6>
            </div>

            <form action="{{ url('add_to_cart', $product->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="align-items-center mb-3">
                    <label for="quantity" class="me-2 fw-bold">Quantidade:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control w-25 m-auto">
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2">
                    Adicionar ao carrinho
                </button>
            </form>
        </div>
    </div>



    @include('home.footer')

    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>