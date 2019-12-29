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
          <li><a href="{{route('development-admin')}}">@lang('admin::sidebarmenu.planning')</a></li>
          <li><a href="{{route('progress-admin')}}">@lang('admin::sidebarmenu.progress')</a></li>
          <li><a href="{{route('finde-admin')}}">@lang('admin::sidebarmenu.journal_development')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-envelope"></i> <span>@lang('admin::sidebarmenu.journal_mosque')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/donade/Masjid">@lang('admin::sidebarmenu.journal_donation')</a></li>
          <li><a href="/admin/costde/Masjid">@lang('admin::sidebarmenu.journal_cost')</a></li>
        </ul>
      </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-glass"></i> <span>@lang('admin::sidebarmenu.list_stakeholder') </span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('mustahiq')}}">@lang('admin::sidebarmenu.list_mustahiq')</a></li>
          <li><a href="{{route('yatim')}}">@lang('admin::sidebarmenu.list_yatim')</a></li>
        </ul>
    </li>
    <li>
      <a href="/admin"><i class="fa fa-info-circle"></i> <span>Dashboard</span></a>
    </li>
      <li class="header" style="color:white">@lang('admin::sidebarmenu.master_data')</li>
      <li>
      <a href="{{route('category')}}"><i class="fa fa-th"></i> <span>@lang('admin::sidebarmenu.category')</span></a>
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
          <a href="#"><i class="fa fa-user"></i><span>@lang('admin::sidebarmenu.user')</span>
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
