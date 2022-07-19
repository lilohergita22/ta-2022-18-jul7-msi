@extends('layouts.front')

@section('title')
welcome to eshop
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>ini landing page</h1>
            <h2>Featured Products</h2>
            <!-- owl carousel -->
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured_products as $prod)
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/upload/products/'.$prod->image) }}" alt="Product Image">
                        <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            <span class="float-start">{{ "Rp. " . number_format($prod->selling_price, 2, ',', '.') }}</span>
                            <span class="float-end"> <s>{{ "Rp. " . number_format($prod->original_price, 2, ',', '.') }}</s> </span>
                            <!-- echo "Rp. " . number_format($total, 2, ',', '.'); -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- owl carousel -->



            <!-- <div class="col-md-3">
                <div class="card">
                    <img src="#" alt="Product Image">
                    <div class="card-body">
                        <h5>judul</h5>
                        <small>harga</small>
                    </div>
                </div>
            </div> -->



        </div>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
            <!-- owl carousel -->
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($trending_category as $tcategory)
                <div class="item">
                    <a href="{{ url('view-category/'.$tcategory->slug) }}">
                        <div class="card">
                            <img src="{{ asset('assets/upload/category/'.$tcategory->image) }}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{ $tcategory->name }}</h5>
                                <p>
                                    {{ $tcategory->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <h1>ini footer</h1>
    <img src="assets/images/slider1.jpg" alt="" width="100%" height="50px">
    <div class="row">
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
      </div>

    <div class="row">
        <div class="col-sm-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, suscipit?
        </div>
        <div class="col-sm-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, suscipit?
        </div>
        <div class="col-sm-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, suscipit?
        </div>
        <div class="col-sm-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, suscipit?
        </div>
    </div>
</div>





<h1>bawah sendiri</h1>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@endsection