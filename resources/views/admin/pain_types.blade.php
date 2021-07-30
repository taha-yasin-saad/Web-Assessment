@extends('layouts.admin')
@section('content')
 <div class="container-fluid">
  <div class="row bg-title">
   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">
     Select Pain Type
    </h4> 
   </div>
   <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
<!--      <li><a href="{{url('admin')}}">@lang('admin.dashboard')</a></li>
 -->     <li class="active">
       Select Pain Type
     </li>
    </ol>
   </div>
  </div>
  <div class="row">
   <div class="col-sm-12">
    <div class="white-box">
     <div class="add-product">
      <h3>
       Select Pain Type
      </h3>
      @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
       </div>
      @endif
      @if (count($errors) > 0)
       <div class="alert alert-danger">
        <ul>
         @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
         @endforeach
        </ul>
       </div>
      @endif
      <form class="form-horizontal" action="{{url('reservation/')}}" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        
        <div class="form-group">
          <label class="col-sm-2 control-label">Pain Type</label>
          <div class="col-sm-10">
           <select class="form-control select2"  name="pain_type_id" required>
                  <option disabled="" selected="">Select Pain Type</option>
                  @foreach($pains as $pain)
                  <option value="{{$pain->id}}" >{{$pain->pain_type}}</option>
                  @endforeach
              </select>
          </div>
        </div>
        
        
        <div class="form-actions m-t-40">
          <button type="submit" class="btn btn-danger"> <i class="fa fa-check"></i> Save</button>
        </div>     
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection