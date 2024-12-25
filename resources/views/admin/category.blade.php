<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin/metadata')

    <style>
        .div-center {
            text-align: center;
            padding-top: 40px;
        }

        .h2-font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input-color {
            color: #000;
        }

    </style>
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
                </div>
            </div>


        </div>

    </div>

    @include('admin/scripts')
</body>

</html>