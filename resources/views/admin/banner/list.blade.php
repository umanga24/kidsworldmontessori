@extends('layouts.admin')
@section('title','Banner List')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<section class="content-header">

    <h1>Gallery<small>List</small></h1>
    <a href="{{route('banner.create')}}" class="btn btn-success">Add Banner</a>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="">Banner</a></li>
        <li><a href="">list</a></li>
    </ol>
</section>
<div class="content">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible message">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session::get('message') !!}
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Team Banner</th>
                                <th>Gallery Banner</th>
                                <th>Update Banner</th>
                                <th>Contact us Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($details as $detail)
                            <tr>
                                <td><img src="{{asset('images/main/'.$detail->team)}}"></td>
                                <td><img src="{{asset('images/main/'.$detail->gallery)}}"></td>
                                <td><img src="{{asset('images/main/'.$detail->updates)}}"></td>
                                <td><img src="{{asset('images/main/'.$detail->contactus)}}"></td>

                                <td>
                                    <a class="btn btn-info edit" href="{{route('banner.edit',$detail->id)}}" title="Edit">Edit</a>
                                    <!-- <form method="post" action="{{route('gallery.destroy',$detail->id)}}" class="delete">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn  btn-danger btn-delete" style="display:inline">Delete</button>
                                    </form> -->
                                </td>

                            </tr>
                            @endforeach
                            @php($i++)

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<!-- DataTables -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.message').fadeOut(3000);
        $('.delete').submit(function(e) {
            e.preventDefault();
            var message = confirm('Are you sure to delete');
            if (message) {
                this.submit();
            }
            return;
        });
    });
</script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>
@endpush