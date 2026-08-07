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
                <h3>Sales</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}">Sales</a></li>
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
                        <h4 class="card-title">Upload Sales Record</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.sales.upload') }}" method="POST"enctype="multipart/form-data"  class="form">@csrf
                                <div class="row">

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="title-column"> Excel File</label>
                                            <input type="file" id="excel-file-column" value="{{ old('excel_import') }}" class="form-control @error('excel_import')
                                            is-invalid
                                            @enderror"
                                            placeholder="Import records in excel file" name="excel_import">
                                            @error('excel_import')
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
