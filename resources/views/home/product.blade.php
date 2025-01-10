<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nossos <span>produtos</span>
            </h2>
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
</section>