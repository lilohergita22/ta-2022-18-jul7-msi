@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{ $category->name }} </h6>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach ($products as $prod)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <!-- <img src="{{ asset('assets/upload/products/'.$prod->image) }}" alt="Product Image">
                    <div class="card-body">
                        <h5>{{ $prod->name }}</h5>
                        <span class="float-start">{{ $prod->selling_price }}</span>
                        <span class="float-end"> <s>{{ $prod->original_price }}</s> </span>
                    </div> -->
                    <a href="{{ url('view-category/'.$category->slug.'/'.$prod->slug) }}" style="width: 18rem;">
                        <img src="{{ asset('assets/upload/products/'.$prod->image) }}" alt="Product Image" style="width: 18rem;">
                        <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            <span class="float-start">{{ $prod->selling_price }}</span>
                            <span class="float-end"> <s>{{ $prod->original_price }}</s> </span>
                        </div>
                    </a>


                    <!-- <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection