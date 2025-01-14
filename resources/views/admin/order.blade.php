<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin/metadata')
</head>

<body>
    <div class="container-scroller">

        @include('admin/sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('admin/header')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div-center">
                        <h2 class="h2-font">Ordens</h2>
                    </div>

                    <div class="container mt-4">
                        <table class="table table-striped table-bordered table-hover" style="font-size: 1.3rem;">
                            <thead class="table-dark">
                                <tr class="tr-container">
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Pagamento</th>
                                    <th>Delivery</th>
                                    <th>Imagem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->product_title}}</td>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('admin/scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>