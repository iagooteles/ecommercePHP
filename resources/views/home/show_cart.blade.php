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
    <title>Ecommerce - PHP - Carrinho</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <!-- sweet alert  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('sweetalert::alert')

    @include('home.header')

    @if(session()->has('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('msg') }}
    </div>
    @endif

    @if(count($cart) > 0)
    <div class="d-flex justify-content-center align-items-center py-10">
        <table class="table table-bordered w-50 mt-5">
            <thead>
                <tr>
                    <th class="th-deg">Produto</th>
                    <th class="th-deg">Quantidade</th>
                    <th class="th-deg">Preço</th>
                    <th class="th-deg">Imagem</th>
                    <th class="th-deg">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0;
                ?>
                @foreach($cart as $cart)
                <tr>
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->product_quantity }}</td>
                    <td>${{ $cart->product_price }}</td>
                    <td><img class="img-cart" src="/product/{{ $cart->product_image }}" alt="{{ $cart->product_title }}"></td>
                    <td><a class="btn btn-danger" href="{{ url('remove_cart', $cart->id) }}" onclick="confirmation(event)">Remover produto</a></td>
                </tr>

                <?php
                $totalPrice += $cart->product_price;
                ?>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <h2 class="total-price-cart">Preço total: ${{ $totalPrice }}</h2>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center py-4">
        <h2 class="finish-order-h2">Finalizar pedido</h2>
        <div>
            <a class="btn btn-danger" href="{{ url('cash_order') }}">Pagar com dinheiro</a>
            <a class="btn btn-danger" href="{{ url('card_order', $totalPrice) }}">Pagar com cartão</a>
        </div>
    </div>
    @else
    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
        <h3 class="mb-10" style="font-size: 1.6rem;">Seu carrinho está vazio, vamos às compras!</h3>
    </div>
    @endif


    @include('home.footer')

    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                    title: "Tem certeza de que deseja cancelar este produto?",
                    text: "Você poderá adicionar o produto novamente depois.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }
    </script>
</body>

</html>