<div class="form-group">
  @if( !empty($label) )
    <label class="col-sm-3 control-label">{{ $label }}</label>
  @endif
  <div class="col-sm-9">
    <div class="input-group">
      @yield('body')
    </div>
  </div>
</div>
