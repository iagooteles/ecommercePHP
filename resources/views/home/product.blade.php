<section class="product_section layout_padding">
    <div class="container">

        @if(session()->has('msg'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('msg') }}
        </div>
        @endif

        <div class="heading_container heading_center">
            <h2>
                Nossos <span>produtos</span>
            </h2>

            <div class="search-container mt-4 container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('search_product_view') }}" class="input-group">
                            @csrf
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Procure por um produto"
                                aria-label="Search">
                            <button type="submit" class="btn btn-danger ml-4">
                                Buscar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                <div class="box">
                    <div class="img-box">
                        <img src="product/{{ $product->image }}" alt="" class="img-fluid">
                    </div>
                    <div class="detail-box">
                        <h5 class="text-center">
                            {{ $product->title }}
                        </h5>

                        <div class="price-box">
                            @if($product->discount_price != null)
                            <h6 class="text-center">
                                <strong>Preço:</strong><br>
                                <span style="text-decoration: line-through; color: red;">${{ $product->price }}</span>
                            </h6>
                            <h6 class="text-center">
                                <strong>Com desconto:</strong><br>
                                ${{ $product->discount_price }}
                            </h6>
                            @else
                            <h6 class="text-center">
                                ${{ $product->price }}
                            </h6>
                            @endif
                        </div>
                    </div>
                    
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $product->id) }}" class="option1">
                                Detalhes
                            </a>

                            <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="col">
                                    <div class="d-flex justify-content-center mb-3">
                                        <input class="w-25" type="number" name="quantity" value="1" min="1">
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" value="Adicionar ao carrinho" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination">
            {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</section>