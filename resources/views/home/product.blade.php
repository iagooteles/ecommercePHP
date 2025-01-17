<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nossos <span>produtos</span>
            </h2>

            <div class="search-container mt-4 container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('product_search') }}" class="input-group">
                            @csrf
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Procure por um produto"
                                aria-label="Search">
                            <button type="submit" class="btn btn-danger ml-4">Search</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $product->id) }}" class="option1">
                                Detalhes
                            </a>

                            <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        <input class="w-25" type="number" name="quantity" value="1" min="1">
                                    </div>
                                    <div>
                                        <input type="submit" value="Adicionar ao carrinho">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{ $product->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $product->title }}
                        </h5>
                        @if($product->discount_price != null)
                        <h6>
                            Desconto:
                            <br>
                            ${{ $product->discount_price }}
                        </h6>
                        <h6 style="text-decoration: line-through; color: red;">
                            Preço
                            <br>
                            ${{ $product->price }}
                        </h6>
                        @else
                        <h6>
                            Preço:
                            <br>
                            ${{ $product->price }}
                        </h6>
                        @endif
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