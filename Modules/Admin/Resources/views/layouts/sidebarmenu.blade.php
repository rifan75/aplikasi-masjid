<ul class="sidebar-menu">
  <li class="header" style="color:white">@lang('admin::sidebarmenu.application')</li>
    
    <li class="treeview">
      <a href="{{route('resume-admin')}}"><i class="fa fa-shopping-cart"></i> <span>@lang('admin::sidebarmenu.create_resume')</span></a>
    </li>
    <li>
      <a href="{{route('article-admin')}}"><i class="fa fa-book"></i> <span>@lang('admin::sidebarmenu.article')</span></a>
    </li>
    <li><a href="{{route('detailevent-admin')}}"><i class="fa fa-anchor"></i> <span>@lang('admin::sidebarmenu.record_event')</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-database"></i> <span>@lang('admin::sidebarmenu.development')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('mustahiq')}}">@lang('admin::sidebarmenu.planning')</a></li>
          <li><a href="{{route('yatim')}}">@lang('admin::sidebarmenu.progress')</a></li>
          <li><a href="{{route('yatim')}}">@lang('admin::sidebarmenu.finance')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-envelope-o"></i> <span>@lang('admin::sidebarmenu.infaq,shodaqoh') </span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('mustahiq')}}">@lang('admin::sidebarmenu.list_mustahiq')</a></li>
          <li><a href="{{route('yatim')}}">@lang('admin::sidebarmenu.list_yatim')</a></li>
          <li><a href="/profile">@lang('admin::sidebarmenu.record_donation')</a></li>
        </ul>
    </li>
    <li>
      <a href="/admin"><i class="fa fa-user"></i> <span>Dashboard</span></a>
    </li>
      <li class="header" style="color:white">@lang('admin::sidebarmenu.master_data')</li>
      <li>
      <a href="{{route('category')}}"><i class="fa fa-book"></i> <span>@lang('admin::sidebarmenu.category')</span></a>
    </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>@lang('admin::sidebarmenu.finance_data')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('type')}}">@lang('admin::sidebarmenu.type_finance')</a></li>
          <li><a href="{{route('donation')}}">@lang('admin::sidebarmenu.account_donation')</a></li>
          <li><a href="{{route('cost')}}">@lang('admin::sidebarmenu.account_cost')</a></li>
        </ul>
      </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-moon-o"></i> <span>@lang('admin::sidebarmenu.mosque')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('mosque-admin')}}">@lang('admin::sidebarmenu.data_mosque')</a></li>
        <li><a href="{{route('lecture')}}">@lang('admin::sidebarmenu.create_lecture')</a></li>
          <li><a href="{{route('event')}}">@lang('admin::sidebarmenu.schedule_event')</a></li>
        </ul>
    </li>
    <li>
      <a href="{{route('scholar')}}"><i class="fa fa-mortar-board"></i> <span>@lang('admin::sidebarmenu.scholar')</span></a>
    </li>
      <li class="treeview">
          <a href="#"><i class="fa fa-info-circle"></i><span>@lang('admin::sidebarmenu.user')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user')}}">@lang('admin::sidebarmenu.manage_user')</a></li>
            <li><a href="{{route('role')}}">@lang('admin::sidebarmenu.manage_role')</a></li>
          </ul>
      </li>
  </ul>
