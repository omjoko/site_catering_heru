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
              	Vendor Management
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
                        <th>Nama Vendor</th>
                        <th>Alamat</th>
                        <th>Kode Pos</th>
                        <th>Telepon</th>
                        <th>Kota</th>
                        <th>Perwakilan</th>
                        <th hidden="">Tipe Pembayaran</th>
                        <th hidden="">No Rekening</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($vendors as $no => $vendor)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $vendor->nama_vendor }}</td>
                        <td>{{ $vendor->alamat }}</td>
                        <td>{{ $vendor->kode_pos }}</td>
                        <td>{{ $vendor->telepon }}</td>
                        <td>{{ $vendor->kota }}</td>
                        <td>{{ $vendor->perwakilan }}</td>
                        @if($vendor->tipe_pembayaran==1)
                          <td hidden=""><span class="label label-success label-mini">Tunai</span></td>
                        @else
                          <td hidden=""><span class="label label-info label-mini">Tunai/Transfer</span></td>
                        @endif
                        <td hidden="">{{ $vendor->no_rek }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $vendor->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $vendor->id }}"><i class="fa fa-trash-o "></i></button>
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

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/vendor') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Vendor*</label>
                        <div class="col-sm-10">
                          <input name="nama_vendor" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input name="alamat" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input name="kode_pos" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <input name="telepon" type="text" placeholder="" class="form-control">
                            <span class="help-inline">089693685702</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-10">
                            <input name="kota" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Perwakilan</label>
                        <div class="col-sm-10">
                            <input name="perwakilan" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_pembayaran" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip"> Tunai </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_pembayaran" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip"> Tunai/Transfer </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Rekening</label>
                        <div class="col-sm-10">
                            <input name="no_rek" type="text" placeholder="" class="form-control">
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

  @foreach($vendors as $no => $vendor)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/vendor') }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $vendor->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Vendor*</label>
                        <div class="col-sm-10">
                          <input name="nama_vendor" type="text" placeholder="" class="form-control" required="" value="{{ $vendor->nama_vendor }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input name="alamat" type="text" placeholder="" class="form-control" value="{{ $vendor->alamat }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input name="kode_pos" type="text" placeholder="" class="form-control" value="{{ $vendor->kode_pos }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <input name="telepon" type="text" placeholder="" class="form-control" value="{{ $vendor->telepon }}">
                            <span class="help-inline">089693685702</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-10">
                            <input name="kota" type="text" placeholder="" class="form-control" value="{{ $vendor->kota }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Perwakilan</label>
                        <div class="col-sm-10">
                            <input name="perwakilan" type="text" placeholder="" class="form-control" value="{{ $vendor->perwakilan }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_pembayaran" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip"> Tunai </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_pembayaran" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip"> Tunai/Transfer </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Rekening</label>
                        <div class="col-sm-10">
                            <input name="no_rek" type="text" placeholder="" class="form-control" value="{{ $vendor->no_rek }}">
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
    <div class="modal fade" id="modalHapus{{ $vendor->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/vendor') }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $vendor->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus akun <b>{{ $vendor->nama_vendor }}</b>?</p>
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
      sOut += '<tr><td>Tipe Pembayaran:</td><td>'+aData[8]+'</td></tr>';
      sOut += '<tr><td>No. Rekening:</td><td>'+aData[9]+'</td></tr>';
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