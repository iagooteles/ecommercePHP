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

                    <div class="div-center">
                        <h1>Adicionar produto</h1>

                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="label-container">
                                <label for="">Nome do produto: </label>
                                <input type="text" name="title" placeholder="Nome do produto" required>
                            </div>

                            <div class="label-container">
                                <label for="">Descrição: </label>
                                <input type="text" name="description" placeholder="Descrição" required>
                            </div>

                            <div class="label-container">
                                <label for="">Preço: </label>
                                <input type="number" name="price" min="0" placeholder="Preço" required>
                            </div>

                            <div class="label-container">
                                <label for="">Quantidade: </label>
                                <input type="number" name="quantity" min="0" placeholder="Quantidade" required>
                            </div>

                            <div class="label-container">
                                <label for="">Desconto: </label>
                                <input type="number" name="discount" min="0" placeholder="Desconto">
                            </div>

                            <div class="label-container">
                                <label for="">Categoria: </label>
                                <select name="category" id="" required>
                                    <option value="" selected>Adicione uma categoria</option>

                                    @foreach($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="img-label-container">
                                <label class="img-label" for="">Imagem: </label>
                                <input id="image-upload" class="choose-image-input" type="file" name="image" required onchange="updateFileName(this)">
                                <p></p>
                                <span id="file-name" class="file-name-feedback">Nenhuma imagem selecionada</span>
                            </div>

                            <div class="label-container">
                                <input class="btn btn-primary" value="Adicionar" type="submit">
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
    function updateFileName(input) {
        var fileName = input.files.length > 0 ? input.files[0].name : "Nenhuma imagem selecionada";
        document.getElementById("file-name").textContent = fileName;
    }
</script>

</html>