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
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                            {{ session()->get('msg') }}
                        </div>
                    @endif

                    <div class="div-center">
                        <h2 class="h2-font">Adicionar categoria</h2>

                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" class="input-color" name="categoryName" placeholder="Category name">

                            <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                        </form>
                    </div>

                    <table class="center">
                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach($data as $data)

                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td><a onclick="return confirm('Você quer mesmo deletar a categoria: {{ $data->category_name }} .')" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a></td>
                        </tr>

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('admin/scripts')
</body>

</html>