@extends('layout.master')
@section('content')
<!--style-->
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
@stop
<!--/style-->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Saless</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}">Saless</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Sales</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.sales.update',$sale->id) }}" method="POST" class="form">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="title-column"> Country</label>
                                            <input type="text" id="user-name-column" value="{{ old('country', $sale->country) }}"
class="form-control @error('country')
                                            is-invalid
                                            @enderror"
                                            placeholder="Country Name" name="country">
                                            @error('country')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="item-type-column">Item Type</label>
                                            <input type="text" value="{{ old('item_type', $sale->item_type) }}"id="item-type-column" class="form-control @error('item_type')
                                            is-invalid
                                            @enderror"
                                            name="item_type" placeholder="Item Type">
                                            @error('item_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="saleschanngel-column">Sales Channel</label>
                                            <input type="text" value="{{ old('sales_channel', $sale->sales_channel) }}"
id="item-type-column" class="form-control @error('sales_channel')
                                            is-invalid
                                            @enderror"
                                            name="sales_channel" placeholder="Sales Channel">
                                            @error('sales_channel')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="order-id-column">Order ID</label>
                                            <input type="number" value="{{ old('order_id', $sale->order_id) }}" 
id="order-id-column" class="form-control @error('order_id')
                                            is-invalid
                                            @enderror"
                                            name="order_id" placeholder="Order ID">
                                            @error('order_id    ')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="    unit-price-column">Unit Price</label>
                                            <input type="number" value="{{ old('unit_price', $sale->unit_price) }}"
id="item-type-column" class="form-control @error('unit_price')
                                            is-invalid
                                            @enderror"
                                            name="unit_price" placeholder="Unit Price">
                                            @error('unit_price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="total-profit-column">Total Profit</label>
                                            <input type="number" value="{{ old('total_profit', $sale->total_profit) }}"
id="total-profit-column" class="form-control @error('total_profit')
                                            is-invalid
                                            @enderror"
                                            name="total_profit" placeholder="Total Profit">
                                            @error('total_profit')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="{{ url()->previous() }}""
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@section('scripts')

@stop
@endsection
