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
                    @if(session()->has('msg'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('msg') }}
                    </div>
                    @endif

                    <table class="center w-75">
                        <h2 class="h2-font div-center">Produtos</h2>

                        <tr class="border tr-products">
                            <th class="th-products">Produto</th>
                            <th class="th-products">Descrição</th>
                            <th class="th-products">Quantidade</th>
                            <th class="th-products">Categoria</th>
                            <th class="th-products">Preço</th>
                            <th class="th-products">Desconto</th>
                            <th class="th-products">Imagem</th>
                            <th class="th-products">Deletar</th>
                            <th class="th-products">Editar</th>
                        </tr>

                        @foreach($data as $product)
                        <tr class="border">
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>
                            <td>$ {{ $product->price }}</td>

                            <td>
                                @if(empty($product->discount_price) || $product->discount_price == 0)
                                Sem Desconto
                                @else
                                $ {{ $product->discount_price }}
                                @endif
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="text-white px-4 py-2 bg-transparent"
                                    style="text-decoration: underline; border: none;"
                                    onclick="openModal('{{ $product->title }}', '/product/{{ $product->image }}')">
                                    Ver Imagem
                                </button>
                            </td>

                            <td>
                                <a
                                    href="{{ url('delete_product', $product->id) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Você quer mesmo deletar {{ $product->title }}')">
                                    Deletar
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ url('edit_product', $product->id) }}"
                                    class="btn btn-success">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    <div id="imageModal"
                        class="fixed inset-0 flex justify-center items-center"
                        style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%; z-index: 9999; justify-content: center; align-items: center; 
                        background-color: rgba(128, 128, 128, 0.7)"
                        onclick="closeModal(event)">
                        <div class="rounded-lg p-4 relative w-96 max-w-full shadow-lg"
                            onclick="event.stopPropagation()"
                            style="background-color: #000 !important"
                            >
                            <button type="button"
                                class="absolute top-2 right-2 text-gray-500 hover:text-black"
                                onclick="closeModal()">
                                &times;
                            </button>
                                              
                            <br><br>

                            <img id="modalImage"
                                src=""
                                alt="Imagem do produto"
                                class="w-full h-auto max-h-[80vh] rounded mx-auto">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin/scripts')
</body>

<script>
    function openModal(title, imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').style.display = 'flex';
    }

    function closeModal(event = null) {
        if (!event || event.target.id === 'imageModal') {
            document.getElementById('imageModal').style.display = 'none';
        }
    }
</script>

</html>