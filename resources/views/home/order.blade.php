<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Ecommerce - PHP - Compras</title>
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

    <div class="order-container container mt-4">
        @if(session()->has('msg'))
        <div class="alert alert-success p-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('msg') }}
        </div>
        @endif
        <table class="table table-striped table-bordered table-hover" style="font-size: 1.3rem;">
            <thead class="table-white">
                <tr class="tr-container">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Pagamento</th>
                    <th>Status</th>
                    <th>Imagem</th>
                    <th>Cancelar Pedido</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $order)
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->product_quantity }}</td>
                    <td>{{ $order->product_price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>

                    <td>
                        <button
                            type="button"
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#imageModal{{ $order->id }}">
                            Ver imagem
                        </button>

                        <div class="modal fade" id="imageModal{{ $order->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-white" id="imageModalLabel{{ $order->id }}">Imagem do Produto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="/product/{{ $order->product_image }}" alt="{{ $order->product_title }}" class="img-fluid modal-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        @if($order->delivery_status=='processando')
                        <a 
                            class="btn btn-danger" 
                            href="{{ url('cancel_order', $order->id) }}"
                            onclick="return confirm('Você quer mesmo cancelar o pedido: {{ $order->product_title }}?')"
                        >Cancelar Pedido</a>
                        @else
                        <p>Pedido Finalizado</p>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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