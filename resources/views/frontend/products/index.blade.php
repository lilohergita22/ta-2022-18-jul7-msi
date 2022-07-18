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


                    <a href="{{ url('view-category/'.$category->slug.'/'.$prod->slug) }}" style="width: 18rem;">
                        <img src="{{ asset('assets/upload/products/'.$prod->image) }}" alt="Product Image" style="width: 10rem;">
                        <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            {{-- <span class="float-start">{{ "Rp. " . number_format($prod->selling_price, 2, ',', '.') }}</span>
                            <span class="float-end"> <s>{{ "Rp. " . number_format($prod->original_price, 2, ',', '.') }}</s> </span> --}}
                        </div>
                        <div class="harga">
                            <div class="d-flex justify-content-start">
                                <span class="fw-bold fs-6">{{ "Rp. " . number_format($prod->selling_price, 2, ',', '.') }}</span>
                                <span class="fw-bold fs-6">{{ "Rp. " . number_format($prod->original_price, 2, ',', '.') }}</span>
                            </div>


                            {{-- <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-primary">{{ "Rp. " . number_format($prod->selling_price, 2, ',', '.') }}</button>
                            <button type="button" class="btn btn-outline-danger">{{ "Rp. " . number_format($prod->original_price, 2, ',', '.') }}</button>
                                </div>
                            </div> --}}
                        </div>
                    </a>

                    {{-- <span class="float-end"> <s>{{ "Rp. " . number_format($prod->original_price, 2, ',', '.') }}</s> </span>
                            <!-- echo "Rp. " . number_format($total, 2, ',', '.'); --> --}}


                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection