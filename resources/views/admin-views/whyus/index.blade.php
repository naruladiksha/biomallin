@extends('layouts.back-end.app')
@section('title', 'Home Content')

@push('css_or_js')
    <link href="{{asset('public/assets/back-end')}}/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">Home Content</li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ \App\CPU\translate('Add')}} {{ \App\CPU\translate('new')}} Home Content
                </div>
                <div class="card-body" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                    <form action="{{route('admin.homecontent.storecontent')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       <input type="text" name="whytitle">
                       <input type="text" name="whycontent">
                       <div class="form-group">
                                    <label for="name">{{ \App\CPU\translate('brand_logo')}}</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="whyimage" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                            </div>
                      
                       <input type="text" name="teamcontent">
                       <div class="form-group">
                                    <label for="name">{{ \App\CPU\translate('brand_logo')}}</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="teambimage" id="customFileUpload1" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload1">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                            </div>
                     
                       <input type="text" name="producttitle">
                       <input type="text" name="productcontent">
                       <input type="text" name="offertitle">
                       <input type="text" name="offercontent">
                       
                       <div class="form-group">
                                    <label for="name">Newsletter Background Image</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="newsletterbg" id="customFileUpload2" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload2">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                            </div>
                       <input type="submit" value="submit">
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });
         $("#customFileUpload1").change(function () {
            readURL(this);
        });
         $("#customFileUpload2").change(function () {
            readURL(this);
        });
        @endpush

