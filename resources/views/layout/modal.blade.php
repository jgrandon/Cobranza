<!-- Modal -->
<div id="{{ $id }}" class="modal fade " role="dialog">
  <div class="modal-dialog @if(!empty($size)) modal-{{ $size }} @endif">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        @if( !empty($body) )
          {{$body}}
        @endif
      </div>
      @if( !empty($footer) )
        <div class="modal-footer">
          {{$footer}}
        </div>
      @endif
    </div>

  </div>
</div>
