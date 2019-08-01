<table id="{{ $id }}" class="table table-stripped table-bordered">
  <thead>
    <tr>
      @foreach($headers as $h)
        <th><strong>{{ $h }}</strong></th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @yield('body')
  </tbody>
</table>
<script type="text/javascript">
  window.onload = function(){
    dataTable = $("#{{ $id }}").DataTable({
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });
  };
</script>
