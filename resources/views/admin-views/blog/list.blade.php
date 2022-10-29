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
<table class="table">
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach($blogs as $blog)
    
    <tr>
        <td><img width="100px" src="{{url('storage/app/public/blogs/') }}/{{$blog->image}}"></td>
        <td>{{$blog->title}}</td>
        <td>{{$blog->description}}</td>
        <td><a class="btn btn-primary" href="{{route('admin.blog.edit',$blog->id)}}">Edit</a> <a class="btn btn-danger"  onclick="return confirm('Are you sure to remove the product')" href="{{route('admin.blog.delete',$blog->id)}}">Delete</a></td>
    </tr>
    
    @endforeach
</table>
    @endsection


