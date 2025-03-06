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
                        <h2 class="h2-font">Adicionar categoria</h2>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" class="input-color py-2" name="categoryName" placeholder="Categoria">
                            <input type="submit" class="btn btn-outline-primary search-btn" name="submit" value="Adicionar">
                        </form>
                    </div>

                    <div class="container col-12 col-md-6">
                        <table class="table table-bordered table-hover text-center" style="font-size: 1.2rem;">
                            <thead class="table-dark">
                                <tr>
                                    <th style="font-weight: bold;">Categoria</th>
                                    <th style="font-weight: bold; width: 25%;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{ $data->category_name }}</td>
                                    <td>
                                        <a
                                            href="{{ url('delete_category', $data->id) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Você quer mesmo deletar a categoria: {{ $data->category_name }}?')">
                                            Deletar
                                        </a>
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
</body>

</html>