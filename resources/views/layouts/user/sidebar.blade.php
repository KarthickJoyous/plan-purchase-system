<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a 
          class="nav-link {{request()->url() == route('user.dashboard') ? '' : 'collapsed'}}" 
          href="{{route('user.dashboard')}}"
        >
          <i class="bi bi-grid"></i>
          <span>{{__('messages.user.sidebar.home')}}</span>
        </a>
      </li><!-- End Home Nav -->

      {{--<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->--}}

      <li class="nav-item">
        <a 
          class="nav-link {{(request()->is('payments') || request()->is('payments/*')) ? '' : 'collapsed'}}" 
          href="{{route('user.payments.index')}}"
        >
          <i class="bi bi-credit-card"></i>
          <span>{{__('messages.user.payments.title')}}</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a 
          class="nav-link {{request()->url() == route('user.profile') ? '' : 'collapsed'}}" 
          href="{{route('user.profile')}}"
        >
          <i class="bi bi-person"></i>
          <span>{{__('messages.user.sidebar.profile')}}</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a 
          class="nav-link collapsed" href="#"
          data-bs-toggle="modal" data-bs-target="#logoutModal"
        >
          <i class="bi bi-box-arrow-in-right"></i>
          <span>{{__('messages.user.sidebar.logout')}}</span>
        </a>
      </li><!-- End Logout Page Nav -->

    </ul>

</aside>