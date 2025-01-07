<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                        <h1>Editar produto</h1>

                        <form action="{{ url('/edit_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="label-container">
                                <label for="">Nome do produto: </label>
                                <input value="{{ $product->title }}" type="text" name="title" placeholder="Nome do produto" required>
                            </div>

                            <div class="label-container ">
                                <label for="">Descrição: </label>
                                <input value="{{ $product->description }}" type="text" name="description" placeholder="Descrição" required>
                            </div>

                            <div class="label-container">
                                <label for="">Preço: </label>
                                <input value="{{ $product->price }}" type="number" name="price" min="0" placeholder="Preço" required>
                            </div>

                            <div class="label-container">
                                <label for="">Quantidade: </label>
                                <input value="{{ $product->quantity }}" type="number" name="quantity" min="0" placeholder="Quantidade" required>
                            </div>

                            <div class="label-container">
                                <label for="">Desconto: </label>
                                <input value="{{ $product->discount_price }}" type="number" name="discount" min="0" placeholder="Desconto">
                            </div>

                            <div class="label-container">
                                <label for="">Categoria: </label>
                                <select name="category" id="" required>
                                    <option value="{{ $product->category }}" selected>{{ $product->category }}</option>

                                    @foreach($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="label-container">
                                <p>Para escolher outra imagem, clique em "Escolher arquivo"</p>
                                <button
                                    type="button"
                                    style="text-decoration: underline;"
                                    onclick="openModal('{{ $product->title }}', '/product/{{ $product->image }}')">
                                    Ver Imagem
                                </button>
                                <input value="{{ $category->image }}" class="choose-image-input" type="file" name="image">
                            </div>

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

                            <div class="label-container">
                                <input class="btn btn-primary" value="Confirmar" type="submit">
                            </div>

                        </form>
                    </div>
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