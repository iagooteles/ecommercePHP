<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    @include('home.header')

    <div class="col-sm-6 col-md-4 col-lg-4 product-container">
        <div class="img-box img-container">
            <img src="product/{{ $product->image }}" alt="">
        </div>
        <div class="detail-box">
            <h5>
                {{ $product->title }}
            </h5>
            @if($product->discount_price != null)
            <h6>
                Desconto: ${{ $product->discount_price }}
            </h6>
            <h6 style="text-decoration: line-through; color: red;">
                Preço: ${{ $product->price }}
            </h6>
            @else
            <h6>
                Preço:
                <br>
                ${{ $product->price }}
            </h6>
            @endif

            <h6>Categoria: {{ $product->category }}</h6>
            <h6>Detalhes: {{ $product->description }}</h6>
            <h6>Quantidade: {{ $product->quantity }}</h6>

            <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                @csrf
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <input class="w-25" type="number" name="quantity" value="1" min="1">
                    </div>
                    <div>
                        <input type="submit" value="Adicionar ao carrinho">
                    </div>
                </div>
            </form>
        </div>
    </div>


    @include('home.footer')

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
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