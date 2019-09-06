@extends('layout.main')
@section('contenido')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <a href="#empresas" data-toggle="collapse" aria-expanded="true">Empresas</a>
          </h4>
        </div>
        <div id="empresas" class="panel-collapse collapse in" aria-expanded="true">
          <div class="panel-body">
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Deudor</strong>
                </div>
                <div class="panel-body">
                  <div class="col-sm-12 invoice-col">
                    <address>
                      {{ $deudor->rut }}
                      <br>
                      <strong>{{ $deudor->razonSocial }}</strong>
                      <br>
                      @php
                      $contacto = $deudor->getContactos($acreedor)[0];
                      $direccion = $deudor->getDirecciones($acreedor)[0];
                      @endphp
                      {{-- {{ var_dump($contacto) }} --}}
                      {{ $contacto->nombre }}
                      <div class="pull-right">
                        <button type="button" class="btn btn-success btn-xs" title="Mas Contactos" name="button"><i class="glyphicon glyphicon-plus"></i></button>
                      </div>
                      <br>
                      {{ $contacto->telefono}}
                      <br>
                      {{ $contacto->email}}
                      <br>
                      {{ $direccion->direccion }} #{{ $direccion->numeracion }} - {{ $direccion->nombreComuna() }}
                      <div class="pull-right">
                        <button type="button" class="btn btn-success btn-xs" title="Mas Direcciones" name="button"><i class="glyphicon glyphicon-plus"></i></button>
                      </div>
                      <br>
                    </address>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="panel panl-default">
                <div class="panel-heading">
                  <strong>Acreedor</strong>
                </div>
                <div class="panel-body">
                  {{ $acreedor->rut }}
                  {{ $acreedor->razonSocial }}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <a href="#documentos" data-toggle="collapse">Documentos</a>
          </h4>
        </div>
        <div id="documentos" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="col-lg-3">
              <ul class="nav nav-tabs tabs-left">
                @foreach ($deudor->getDocumentosAdeudados($acreedor->id) as $i => $doc)
                  @if($i==0)
                    <li class="active">
                      <a href="#doc-{{$doc->id}}" data-toggle="tab" aria-expanded="true">{{ $doc->nombreDoc() }}<br>#{{$doc->folio}}</a>
                    </li>
                  @else
                    <li class="">
                      <a href="#doc-{{$doc->id}}" data-toggle="tab" aria-expanded="false">{{ $doc->nombreDoc() }}<br>#{{$doc->folio}}</a>
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                @foreach ($deudor->getDocumentosAdeudados($acreedor->id) as $i => $doc)
                  <div class="tab-pane @if($i==0) active @endif" id="doc-{{$doc->id}}">
                    <p class="lead">
                      {{$doc->nombreDoc()}} #{{$doc->folio}}
                      <br>
                      Emision : {{$doc->fechaEmision}}
                      <br>
                      Total   : $ {{number_format($doc->monto,0,',','.')}}
                    </p>

                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#detalle-cuotas" data-toggle="collapse" aria-expanded="true">Cuotas</a>
                        </div>
                        <div id="detalle-cuotas" class="panel-collapse collapse" >
                          <div class="panel-body">
                            @component('layout.table')
                            @slot('id','dt-cuotas-'.$doc->id)
                            @slot('headers',['Fecha','Documento','Monto'])
                              @slot('body')
                                @foreach ($doc->cuotas() as $j => $c)
                                  <tr>
                                    <td>{{$c->fechaVencimiento}}</td>
                                    <td>CUOTA {{$c->numeroCuota}} - {{$doc->nombreDoc()}} #{{$doc->folio}}</td>
                                    <td>{{$c->monto}}</td>
                                  </tr>
                                @endforeach
                              @endslot
                            @endcomponent
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#cobranzas-previas" data-toggle="collapse" aria-expanded="true">Cobranzas Previas</a>
                        </div>
                        <div id="cobranzas-previas" class="panel-collapse collapse" >
                          <div class="panel-body">
                            @component('layout.table')
                            @slot('id',"dt-cobranzas-".$doc->id)
                            @slot('headers',['Fecha','Estado','Observacion'])
                              @slot('body')
                                @foreach ($doc->cobranzas() as $j => $c)
                                  <tr>
                                    <td>{{$c->fecha}}</td>
                                    <td>{{$c->estado}}</td>
                                    <td>{{$c->observacion}}</td>
                                  </tr>
                                @endforeach
                              @endslot
                            @endcomponent
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <input type="hidden" name="idDeudor" id="idDeudor" value="{{ $deudor->id}}">
  <input type="hidden" name="idAcreedor" id="idAcreedor" value="{{ $acreedor->id}}">


  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <a href="#panel-cobranza" data-toggle="collapse" aria-expanded="true">Cobranza Actual</a>
          </h4>
        </div>
        <div id="panel-cobranza" class="panel-collapse collapse in" aria-expanded="true">
          <div class="panel-body">
            <div class="panel-inicial">
              <button type="button" class="btn btn-info btn-cobranza" data-accion="sin-respuesta" name="button">Sin Respuesta</button>
              <button type="button" class="btn btn-info btn-cobranza" data-accion="no-reconoce" name="button">No reconoce documento</button>
              <button type="button" class="btn btn-info btn-cobranza" data-accion="compromiso" name="button">Compromiso de Pago</button>
              <button type="button" class="btn btn-info btn-cobranza" data-accion="pago-realizado" name="button">Pago ya Realizado</button>
              <button type="button" class="btn btn-info btn-cobranza" data-accion="otro" name="button">Otra Respuesta</button>
            </div>
            <div style="display:none" class="panel-accion-cobranza">

            </div>






          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="pull-right">
      <a href="{{ route('deudores') }}" class="btn  btn-success">Volver</a>
    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('js/cobranza.js') }}"></script>
@endsection
