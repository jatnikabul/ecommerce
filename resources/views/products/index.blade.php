@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 offset-md-8">
            <div class="form-group">
                <select id="order_field" class="form-control">
                    <option value="" disabled selected>Urutkan</option>
                    <option value="best_seller">Best Seller</option>
                    <option value="terbaik">Terbaik (Berdasarkan Rating)</option>
                    <option value="termurah">Termurah</option>
                    <option value="termahal">Termahal</option>
                    <option value="terbaru">Terbaru</option>
                </select>
            </div>
        </div>
    </div>
    <div id="product-list">
    @foreach($products as $idx => $product)
        @if ($idx == 0 || $idx % 4 == 0)
            <div class="row mt-4">
        @endif

        <div class="col">
            <div class="card">
                <img src="{{ asset('/images/' . $product->image_url) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                         <a href="{{ route('products.show', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <p class="car-text">
                        {{ $product->price }}
                    </p>
                    <a href="{{ route('carts.add', $product->id) }}" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>

        @if ($idx > 0 && $idx % 4 == 3)
            </div>
        @endif
    @endforeach
</div>
</div>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#order_field').change(function(){
            // window.location.href = '/?order_by=' + $(this).val();
            $.ajax({
                type: 'GET', 
                url: '/products',
                data: {
                    order_by: $(this).val(),
                },
                dataType: 'json',
                success: function(data) {
                    var products = '';
                    $.each(data, function(idx, product) {
                        if(idx == 0 || idx % 4 == 0) {
                            products += '<div class="row mt-4">';
                        }
                        products += '<div class="col">' +
                        '<div class="card">' +
                        '<br>' +
                        '<div class="text-center">' +
                        '<img src="/images/' + product.image_src + '" class="img-thumbnail img-fluid" style="width: 150px; height: 200px;" alt="">' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">' +
                        '<a class="nav-link text-dark" href="/products/' + product.id + '">' +
                        product.name +
                        '</a>' +
                        '<hr>' +
                        '</h5>' +
                        '<p class="card-text">' +
                        product.price +
                        '</p>' +
                        '<a href="/card/add/' + product.id + '" class="btn btn-success">Buy</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                        if(idx > 0 && idx % 4 == 3) {
                            products += '</div>';
                        }
                    });
                    // update element
                    $('#product-list').html(products);
                },
                error: function(data) {
                    alert('Unable to handle request');
                }
            });
        });
    });
</script>
@endsection

                   

    
