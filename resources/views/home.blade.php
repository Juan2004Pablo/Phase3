@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- SEARCH FORM -->
        @include('custom.modal_search-product')
        <!-- -->
        
        <div class="container">
            <!---->
            <div class="album py-5 bg-light">

                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">Products</h1>

                </div>

                <div class="container">

                    <div class="row">
                        @foreach($products as $item)
                            @if($item->quantity>0)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img class="bd-placeholder-img"
                                             src="{{ $item->images->random()->url }}"
                                             width="267" height="225" title="Products">
                                        <div class="card-body">
                                            <p class="text-center" style="font-weight: 700; font-size: 1.25rem; text-transform: uppercase;">{{ $item->name }} </p>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <p class="card-text">{{ $item->price }}</p>
                                            <p class="card-text">Available: {{ $item->quantity }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <td><a class="btn btn-sm btn-outline-secondary"
                                                           href="{{ route('product.show',$item->id) }}"><i class="far fa-eye"></i></a></td>
                                                    <td><a class="btn btn-sm btn-outline-secondary"
                                                           href="{{ route('cart.add',$item->id) }}"><i class="fas fa-cart-plus"></i></a></td>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <!---->

        </div>
        {{ $products->appends($_GET)->links() }}
    </div>
    </div>
@endsection
