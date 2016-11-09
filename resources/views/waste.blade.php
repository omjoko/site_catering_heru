@extends('layouts.layouts')

@push('css')
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
  	<div class="col-lg-12">
      	<section class="panel">
         	 <header class="panel-heading">
              	Manajemen Sampah
          	</header>
          	<div class="panel-body">
              <div class="container-fluid">
                  <div class="container-fluid">
                  <span class="pull-right">
                    <button class="btn btn-success" data-toggle="modal" href="#modalTambah" >
                      <span class="fa fa-plus-circle"></span> Tambah Data
                    </button>
                  </span>
              </div>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-advance table-hover" id="hidden-table-info">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sampah</th>
                        <th>Jenis</th>
                        <th>Berat</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($wastes as $no => $waste)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $waste->nama_sampah }}</td>
                        @if($waste->jenis_sampah==1)
                          <td><span class="label label-warning label-mini">Sampah Masak</span></td>
                        @else
                          <td><span class="label label-danger label-mini">Sampah Makan</span></td>
                        @endif
                        <td>{{ $waste->berat }} Kg</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $waste->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $waste->id }}"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
          	</div>
      	</section>
  	</div>
</div>

<!-- MODAL COLLECTIONS -->
  <!-- Modal Tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/waste') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Sampah</label>
                        <div class="col-sm-10">
                          <input name="nama_sampah" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Sampah</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari memasak di dapur"> Sampah Masak </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari masakan yang telah dimakan penumpang"> Sampah Makan </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Berat Sampah</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input name="berat" type="number" placeholder="" class="form-control" required="">
                            <div class="input-group-addon">Kg</div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Pelayaran</label>
                        <div class="col-sm-10">
                          <table class="display table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Asal</th>
                                     <th>Tujuan</th>
                                     <th>Keberangkatan</th>
                                     <th>Kapal</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($voyages as $no => $voyage)
                                 <tr>
                                     <td>
                                       <div class="radio">
                                           <label><input type="radio" id='regular' name="id_voyages">{{ $no+1 }}</label>
                                       </div>
                                     </td>
                                     <td>
                                       <div class="radiotext">
                                           <label for='regular'>
                                              @foreach($pelabuhans as $pelabuhan)
                                                @foreach($rutes as rute)
                                                  @if($pelabuhan->id_pelabuhan==$voyage->rute['asal'])
                                                   {{ $pelabuhan->nama_pelabuhan }}
                                                  @endif
                                                @endforeach
                                              @endforeach
                                           </label>
                                       </div>
                                     </td>
                                     <td>
                                       <div class="radiotext">
                                           <label for='regular'>Jakarta</label>
                                       </div>
                                     </td>
                                     <td>
                                       <div class="radiotext">
                                           <label for='regular'>2016-11-09 01:05:00</label>
                                       </div>
                                     </td>
                                     <td>
                                       <div class="radiotext">
                                           <label for='regular'>Lauser</label>
                                       </div>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                          </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>

                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal tambah-->

  @foreach($wastes as $no => $waste)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $waste->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/waste') }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $waste->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Sampah</label>
                        <div class="col-sm-10">
                          <input name="nama_sampah" type="text" placeholder="" class="form-control" required="" value="{{ $waste->nama_sampah }}">
                        </div>
                    </div>
                    @if($waste->jenis_sampah==1)
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Sampah</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari memasak di dapur"> Sampah Masak </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari masakan yang telah dimakan penumpang"> Sampah Makan </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Sampah</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios1" value="1">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari memasak di dapur"> Sampah Masak </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_sampah" id="optionsRadios2" value="2" checked>
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Sampah dari masakan yang telah dimakan penumpang"> Sampah Makan </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Berat Sampah</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input name="berat" type="number" placeholder="" class="form-control" required="" value="{{ $waste->berat }}">
                            <div class="input-group-addon">Kg</div>
                          </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Ubah</button>
                    </div>

                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal update-->

  <!-- Modal Hapus -->
    <div class="modal fade" id="modalHapus{{ $waste->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/waste') }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $waste->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus sampah <b>{{ $waste->nama_sampah }}</b>?</p>
                </center>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
          </div>
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /END modal Hapus -->
  @endforeach
<!-- END MODAL COLLECTIONS -->
@endsection

@push('js')
<!--custom switch-->
<script src="js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="js/jquery.tagsinput.js"></script>
<!--custom checkbox & radio-->
<script type="text/javascript" src="js/ga.js"></script>

<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="js/respond.min.js" ></script>

<!--script for this page-->
<script src="js/form-component.js"></script>

<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<!-- js placed at the end of the document so the pages load faster -->
<!--<script src="js/jquery.js"></script>-->
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<script type="text/javascript">
  /* Formating function for row details */
  function fnFormatDetails ( oTable, nTr )
  {
      var aData = oTable.fnGetData( nTr );
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

      sOut += '</table>';

      return sOut;
  }

  $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement( 'th' );
      var nCloneTd = document.createElement( 'td' );
      nCloneTd.innerHTML = '<img src="assets/advanced-datatable/examples/examples_support/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each( function () {
          this.insertBefore( nCloneTh, this.childNodes[0] );
      } );

      $('#hidden-table-info tbody tr').each( function () {
          this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
      } );

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable( {
          "aoColumnDefs": [
              { "bSortable": false, "aTargets": [ 0 ] }
          ],
          "aaSorting": [[1, 'asc']]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function () {
          var nTr = $(this).parents('tr')[0];
          if ( oTable.fnIsOpen(nTr) )
          {
              /* This row is already open - close it */
              this.src = "assets/advanced-datatable/examples/examples_support/details_open.png";
              oTable.fnClose( nTr );
          }
          else
          {
              /* Open this row */
              this.src = "assets/advanced-datatable/examples/examples_support/details_close.png";
              oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
          }
      } );
  } );
</script>
@endpush