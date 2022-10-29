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
                   <form action="{{route('admin.homecontent.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="whytitle">Why Title</label>
                       <input type="text" class="form-control" name="whytitle" value="{{$homee->whytitle}}">
                       </div>
                       <div>
                         <label>Why Content</label>
                         <input type="text" class="form-control" name="whycontent" value="{{$homee->whycontent}}">
                         </div>
                         <div>
                         <label>Why Content1</label>
                         <input type="text" class="form-control" name="whycontent1" value="{{$homee->whycontent1}}">
                         </div>
                       <img width="100px" src="{{url('storage/app/public/homecontent/') }}/{{$homee->whyimage}}">
                       
                       <div class="form-group">
                                    <label for="name">Why Image</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="whyimage" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                                <div>
                                    <label>Team Content</label>
                                    <textarea class="form-control textarea" name="teamcontent">{{$homee->teamcontent}}</textarea>
                                </div>
                      
                       <img width="100px" src="{{url('storage/app/public/homecontent/') }}/{{$homee->teambimage}}"> 
                                              <div class="form-group">
                                    <label for="name">Team background Image</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="teambimage" id="customFileUpload1" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload1">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                       <div><label>Product Title</label>
                        <input type="text" class="form-control textarea" name="producttitle"  value="{{$homee->producttitle}}"></div>
                     
                       <div><label>Product Content</label>
                        <input type="text" class="form-control" name="productcontent"  value="{{$homee->productcontent}}"></div>
                      
                       <div><label>Offer Title</label>
                        <input type="text" class="form-control" name="offertitle"  value="{{$homee->offertitle}}"></div>
                     
                       <div><label>Offer Content</label>
                        <input type="text" class="form-control" name="offercontent"  value="{{$homee->offercontent}}"></div>
                        <img width="100px" src="{{url('storage/app/public/homecontent/') }}/{{$homee->newsletterbg}}">
                          <div class="form-group">
                                    <label for="name">Newsletter background Image</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="newsletterbg" id="customFileUpload2" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload2">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                            </div>
                             <img width="100px" src="{{url('storage/app/public/homecontent/') }}/{{$homee->couponbg}}">
                          <div class="form-group">
                                    <label for="name">Coupon background Image</label><span class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 1:1 )</span>
                                    <div class="custom-file" style="text-align: left" required>
                                        <input type="file" name="couponbg" id="customFileUpload3" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload2">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                            </div>
                              <div><label>New Product Title</label>
                        <input type="text" class="form-control textarea" name="newproducttitle"  value="{{$homee->newproducttitle}}"></div>
                     
                       <div><label>New Product Content</label>
                        <input type="text" class="form-control" name="newproductcontent"  value="{{$homee->newproductcontent}}"></div>
                        
                        <div><label>Extra Title</label>
                        <input type="text" class="form-control" name="extratitle"  value="{{$homee->extratitle}}"></div>
                           
                         <div><label>Featured Product Title</label>
                        <input type="text" class="form-control textarea" name="featuredtitle"  value="{{$homee->featuredtitle}}"></div>
                     
                       <div><label>Featured Product Content</label>
                        <input type="text" class="form-control" name="featuredcontent"  value="{{$homee->featuredcontent}}"></div>
                        
                        <div><label>Counter date & time (ex: nov 2, 2022 11:30:00)</label>
                        <input type="text" class="form-control" name="counter"  value="{{$homee->counter}}"></div>
                        
                       <input type="submit" value="update">
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
         $("#customFileUpload3").change(function () {
            readURL(this);
        });
       </script>
   <script src="{{asset('/')}}vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}vendor/ckeditor/ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor({
            contentsLangDirection : '{{Session::get('direction')}}',
        });
    </script> 
   
        @endpush

