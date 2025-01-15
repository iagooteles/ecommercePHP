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

                    @if(session()->has('msg'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                            {{ session()->get('msg') }}
                        </div>
                    @endif

                    <div class="div-center">
                        <h2>Enviar email para: {{ $order->email }}</h2>
                    </div>

                    <form action="{{ url('send_user_email', $order->id) }}" method="POST" class="email-form">
                        @csrf
                        <div class="form-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea name="mensagem" id="mensagem" rows="5" placeholder="Digite sua mensagem..." required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Enviar</button>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
    @include('admin/scripts')
</body>

</html>