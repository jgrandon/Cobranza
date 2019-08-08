<div class="x_panel" id="@yield('id')">
  <div class="x_title">
    <h2>@yield('titulo')</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
  @yield('body')
  </div>
</div>
