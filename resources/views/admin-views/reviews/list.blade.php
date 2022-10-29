@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Review List'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a></li>
                <li class="breadcrumb-item" aria-current="page">{{\App\CPU\translate('reviews')}}</li>
            </ol>
        </nav>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="flex-between row justify-content-between flex-grow-1 mx-1">
                            <div class="col-12 col-sm-6">
                                <div class="flex-start">
                                    <div><h5>{{ \App\CPU\translate('Review')}} {{ \App\CPU\translate('Table')}}</h5></div>
                                    <div class="mx-1"><h5 style="color: rgb(252, 59, 10);">({{ $reviews->total() }})</h5></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="{{\App\CPU\translate('Search by Product or Customer')}}" aria-label="Search orders" value="{{ $search }}" required>
                                        <button type="submit" class="btn btn-primary">{{\App\CPU\translate('search')}}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="col-12  card-body" style="padding: 0">
                        <div class="table-responsive datatable-custom">
                            <table 
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                class="table table-borderless table-thead-bordered table-align-middle card-table"
                                >
                                <thead class="thead-light">
                                <tr>
                                    <th class="col-1">#{{ \App\CPU\translate('sl')}}</th>
                                    <th class="col-3">{{ \App\CPU\translate('Product')}}</th>
                                    <th class="col-2">{{ \App\CPU\translate('Customer')}}</th>
                                    <th class="col-1">{{ \App\CPU\translate('Rating')}}</th>
                                    <th class="col-5">{{ \App\CPU\translate('Review')}}</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($reviews as $key=>$review)
                                    @if($review->product)
                                        <tr>
                                            <td class="col-1">{{$reviews->firstItem()+$key}}</td>
                                            <td class="col-3">
                                            <span class="d-block font-size-sm text-body">
                                                <a href="{{route('admin.product.view',[$review['product_id']])}}">
                                                    {{$review->product['name']}}
                                                </a>
                                            </span>
                                            </td>
                                            <td class="col-2">
                                                @if($review->customer)
                                                    <a href="{{route('admin.customer.view',[$review->customer_id])}}">
                                                        {{$review->customer->f_name." ".$review->customer->l_name}}
                                                    </a>
                                                @else
                                                    <label class="badge badge-danger">{{\App\CPU\translate('customer_removed')}}</label>
                                                @endif
                                            </td>
                                            <td class="col-1">
                                                <label class="badge badge-soft-info" >
                                                    <span style="font-size: .9rem;">{{$review->rating}} <i class="tio-star"></i> </span>
                                                </label>
                                            </td>
                                            <td class="col-5">
                                                <p style=" word-wrap: break-word;">
                                                    {{$review->comment?$review->comment:"No Comment Found"}}
                                                </p>
                                                @foreach (json_decode($review->attachment) as $img)
                                                
                                                    <a class="float-left" href="{{asset('storage/app/public/review')}}/{{$img}}" data-lightbox="mygallery">
                                                        <img style="width: 60px;height:60px;padding:10px; " src="{{asset('storage/app/public/review')}}/{{$img}}" alt="">
                                                    </a>
                                                
                                                @endforeach
                                            </td>
                                            
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$reviews->links()}}
                    </div>
                    @if(count($reviews)==0)
                        <div class="text-center p-4">
                            <img class="mb-3" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0">{{ \App\CPU\translate('No_data_to_show')}}</p>
                        </div>
                    @endif
                    <!-- End Table -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

@endsection

@push('script_2')
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            // var datatable = $.HSCore.components.HSDatatables.init($('#columnSearchDatatable'));

            $('#column1_search').on('keyup', function () {
                datatable
                    .columns(1)
                    .search(this.value)
                    .draw();
            });

            $('#column2_search').on('keyup', function () {
                datatable
                    .columns(2)
                    .search(this.value)
                    .draw();
            });

            $('#column3_search').on('change', function () {
                datatable
                    .columns(3)
                    .search(this.value)
                    .draw();
            });

            $('#column4_search').on('keyup', function () {
                datatable
                    .columns(4)
                    .search(this.value)
                    .draw();
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>
@endpush
