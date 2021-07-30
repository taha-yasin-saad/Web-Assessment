<ul class="nav" id="side-menu">
    <li class="user-pro">
        <a href="#" class="waves-effect"><img src="{{asset('assets/admin/')}}/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> {{Auth::user()->name}}n<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
            <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
        </ul>
    </li>
    <li> <a href="{{url('personal_information')}}" class="waves-effect"><i class="fa fa-home" data-icon="v"></i> <span class="hide-menu"> Personal Information</span></a></li>
    @if(Auth::user()->role == 2)
    <li> <a href="{{url('select_pain_type')}}" class="waves-effect"><i class="fa fa-home" data-icon="v"></i> <span class="hide-menu"> select pain type</span></a></li>
    @endif
    <li> <a href="{{url('reservations')}}" class="waves-effect"><i class="fa fa-home" data-icon="v"></i> <span class="hide-menu">Reservations</span></a></li>
    @if(Auth::user()->role != 0)
    <li> <a href="{{url('notifications')}}" class="waves-effect"><i class="fa fa-home" data-icon="v"></i> <span class="hide-menu">Notifications</span>@if(count(Auth::user()->notifications_unread)>0)<span class="label label-rouded label-danger pull-right">{{count(Auth::user()->notifications_unread)}}</span>@endif</a></li>
    @endif
    
</ul>