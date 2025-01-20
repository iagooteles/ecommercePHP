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
                                    class="text-white px-4 py-2 rounded"
                                    style="text-decoration: underline;"
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

                        <div
                            id="imageModal"
                            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden"
                            onclick="closeModal(event)">
                            <div
                                class="bg-white rounded-lg p-4 relative w-96 max-w-full"
                                onclick="event.stopPropagation()">
                                <button
                                    type="button"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl font-bold"
                                    onclick="closeModal()">
                                    &times;
                                </button>
                                <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
                                <img
                                    id="modalImage"
                                    src=""
                                    alt="Imagem do produto"
                                    class="w-full max-w-xs h-auto max-h-70 rounded mx-auto">
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin/scripts')
</body>

<script>
    function openModal(title, imageUrl) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal(event = null) {
        if (!event || event.target.id === 'imageModal') {
            document.getElementById('imageModal').classList.add('hidden');
        }
    }
</script>

</html>