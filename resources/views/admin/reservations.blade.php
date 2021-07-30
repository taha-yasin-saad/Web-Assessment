@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Reservations</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active">Reservations</li>
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
                    <h3 class="box-title m-b-0">Reservations</h3>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                @if(Auth::user()->role != 2)
                                <th>Patient Name</th>
                                @endif
                                <th>Pain Type</th>
                                @if(Auth::user()->role != 1)
                                <th>Doctor Name</th>
                                @endif
                                <th>Appointment</th>
                                @if(Auth::user()->role == 0)
                                <th>Reason Refuse</th>
                                <th>suitable date</th>
                                @endif
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody class="show-products">

                            @foreach($reservations as $key=>$value)
                                <tr  >
                                    <th scope="row">
                                        {{$key+1}}
                                    </th>
                                    @if(Auth::user()->role != 2)
                                    <td>@if($value->patient){{$value->patient->f_name}} {{$value->patient->l_name}}@else - @endif</td>
                                    @endif
                                    <td>@if($value->pain_type){{$value->pain_type->pain_type}}@else - @endif</td>
                                    @if(Auth::user()->role != 1)
                                    <td>@if($value->doctor){{$value->doctor->f_name}} {{$value->doctor->l_name}}@else - @endif</td>
                                    @endif
                                    <td>{{$value->appointment}}</td>
                                    @if(Auth::user()->role == 0)
                                    <th>
                                        @if($value->status == 3) 
                                        {{$value->refuse_reason_doctor}}
                                        @elseif($value->status == 2) 
                                        @if($value->refuse_reason == 1)
                                        change the doctor
                                        @else
                                        reschedule
                                        @endif
                                        @endif
                                    </th>
                                    <th>{{$value->suitable_date}}</th>
                                    @endif
                                    <td>@if($value->status == 0) Pending  @elseif($value->status == 1) Assigned @elseif($value->status == 2) Refused from Patients @elseif($value->status == 3) Refused from Doctors @endif</td>

                                    <td class="product-option">
                                        @if($value->status == 0)
                                            @if(Auth::user()->role == 0)
                                             <a href="{{url('update_reservation/'.$value->id)}}" title="Edit" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">
                                                <i class='fa fa-pencil-square-o'></i>
                                            </a>
                                            @endif
                                        @elseif($value->status == 1)
                                            <a href="{{url('refused/'.$value->id)}}" title="Refused" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">
                                                <i class='fa fa-remove'></i>
                                            </a>
                                        @else
                                        @if(Auth::user()->role == 0)
                                         <a href="{{url('update_reservation/'.$value->id)}}" title="Edit" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">
                                            <i class='fa fa-pencil-square-o'></i>
                                        </a>
                                        @endif
                                        @endif
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