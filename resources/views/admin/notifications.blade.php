@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Notifications</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active">Notifications</li>
                </ol>
            </div>
        </div>
        <!-- /row -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Notifications</h3>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody class="show-products">

                            @foreach($notifications as $key=>$value)
                                <tr  >
                                    <th scope="row">
                                        {{$key+1}}
                                    </th>
                                    <td>{{$value->message}}</td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection