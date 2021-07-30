@extends('layouts.admin')
@section('content')
 <div class="container-fluid">
  <div class="row bg-title">
   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">
     Personal Information
    </h4> 
   </div>
   <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
<!--      <li><a href="{{url('admin')}}">@lang('admin.dashboard')</a></li>
 -->     <li class="active">
       Personal Information
     </li>
    </ol>
   </div>
  </div>
  <div class="row">
   <div class="col-sm-12">
    <div class="white-box">
     <div class="add-product">
      <h3>
       Personal Information
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
      <form class="form-horizontal" action="{{url('personal_information/')}}" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label class="col-sm-2 control-label">* First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{old('f_name',Auth::user()->f_name)}}" name="f_name" required/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">* Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{old('l_name',Auth::user()->l_name)}}" name="l_name" required/>
          </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 control-label">* Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" value="{{old('email',Auth::user()->email)}}" name="email" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">* Mobile</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{old('mobile',Auth::user()->mobile)}}" name="mobile" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">* Birth date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control birth_date" value="{{old('birth_date',Auth::user()->birth_date)}}" name="birth_date" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">* Gender</label>
          <div class="col-sm-10">
           <select class="form-control select2"  name="gender" required>
                  <option disabled="" selected="">Select Gender</option>
                  <option value="1" @if(old('gender',Auth::user()->gender) ==  1 ) selected @endif >Male</option>
                  <option value="2" @if(old('gender',Auth::user()->gender) ==  2 ) selected @endif >Female</option>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">* Country</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{old('country',Auth::user()->country)}}" name="country" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">* Occupation</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{old('occupation',Auth::user()->occupation)}}" name="occupation" required/>
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
