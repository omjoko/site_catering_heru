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
                Manajemen Rute
            </header>
            <div class="panel-body">
              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <button href="#modalTambah" class="btn btn-success" data-toggle="modal">
                              <span class="fa fa-plus-circle"></span> Tambah Data
                            </button>
                  </span>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-advance table-hover" id="hidden-table-info"  style="text-align: center;">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="text-align: center;">Asal</th>
                        <th style="text-align: center;">Tujuan</th>
                        <th style="text-align: center;">Estimasi Total</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php use App\Http\Controllers\RuteController; $ke=0; $arrayTrans = array(); ?>
                    @foreach($rutes as $no => $rute)
                    <?php 
                        $transits = RuteController::sedotTransit($rute->id);
                        $arrayTrans[] = $transits;
                    ?>
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>
                        @foreach($pelabuhans as $pelabuhan)
                          @if($rute->asal==$pelabuhan->id_pelabuhan)
                            {{ $pelabuhan->nama_pelabuhan }}
                          @endif
                        @endforeach
                        </td>
                        <td>
                        @foreach($pelabuhans as $pelabuhan)
                          @if($rute->tujuan==$pelabuhan->id_pelabuhan)
                            {{ $pelabuhan->nama_pelabuhan }}
                          @endif
                        @endforeach
                        </td>
                        <td>{{ $rute->est_rute }} Hari</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $rute->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $rute->id }}"><i class="fa fa-trash-o "></i></button>
                            <a href="transit?id={{ $rute->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Transit</button></a>
                        </td>
<<<<<<< HEAD
                        <td hidden="">
                            {{$ke}}
                        </td>
=======
>>>>>>> origin/master
                      </tr>
                      <?php $ke++; ?>
                      @endforeach
                    </tbody>
                </table>
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

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/rute') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Asal</label>
                        <div class="col-sm-10">
                            <select class="form-control m-bot15" name="asal">
                              @foreach($pelabuhans as $pelabuhan)
                              <option value="{{ $pelabuhan->id_pelabuhan }}">{{ $pelabuhan->nama_pelabuhan }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-10">
                            <select class="form-control m-bot15" name="tujuan">
                              @foreach($pelabuhans as $pelabuhan)
                              <option value="{{ $pelabuhan->id_pelabuhan }}">{{ $pelabuhan->nama_pelabuhan }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Estimasi Total</label>
                        <div class="col-sm-10">
                          <input name="est_rute" type="text" placeholder="" class="form-control" required="">
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

@foreach($rutes as $rute)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $rute->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Rute</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $rute->id }}">

                    
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                        <div class="col-sm-10">                              
                              <select class="form-control" name="asal">
                              @foreach($pelabuhans as $pelabuhan)
                                @if($rute->asal==$pelabuhan->id_pelabuhan)
                                  <option value="{{ $pelabuhan->id_pelabuhan }}" selected="">{{ $pelabuhan->nama_pelabuhan }}</option>
                                @else
                                  <option value="{{ $pelabuhan->id_pelabuhan }}">{{ $pelabuhan->nama_pelabuhan }}</option>
                                @endif
                              @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tujuan">
                            @foreach($pelabuhans as $pelabuhan)
                                @if($rute->tujuan==$pelabuhan->id_pelabuhan)
                                  <option value="{{ $pelabuhan->id_pelabuhan }}" selected="">{{ $pelabuhan->nama_pelabuhan }}</option>
                                @else
                                  <option value="{{ $pelabuhan->id_pelabuhan }}">{{ $pelabuhan->nama_pelabuhan }}</option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Estimasi Total</label>
                        <div class="col-sm-10">
                          <input name="est_rute" type="text" class="form-control" required="" value="{{ $rute->est_rute }}">
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
    <div class="modal fade" id="modalHapus{{ $rute->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger" style="background-color: red;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $rute->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus rute
                          <b>
                          @foreach($pelabuhans as $pelabuhan)
                            @if($rute->asal==$pelabuhan->id_pelabuhan)
                              {{ $pelabuhan->nama_pelabuhan }}
                            @endif
                          @endforeach
                          =>                        
                        @foreach($pelabuhans as $pelabuhan)
                          @if($rute->tujuan==$pelabuhan->id_pelabuhan)
                            {{ $pelabuhan->nama_pelabuhan }}
                          @endif
                        @endforeach</b>?</p>
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

            </div>
        </section>
    </div>
</div>
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
  function fnFormatDetails ( oTable, nTr, id_bahan )
  {
      var aData = oTable.fnGetData( nTr );
<<<<<<< HEAD
      var kes = aData[6];
      var arrayTrans = <?php echo json_encode($arrayTrans);?>;
      console.log(arrayTrans[kes]);
      var tableData = arrayTrans[kes];
      // var sOut = kes;
      var sOut =        '<table class="table table-striped">';
          sOut +=                  '<tr>';
          sOut +=                    '<th  style="text-align: center; background-color:gray; color:white;">No</th>';
          sOut +=                    '<th  style="text-align: center; background-color:gray; color:white;">Nama Pelabuhan</th>';
          sOut +=                    '<th  style="text-align: center; background-color:gray; color:white;">Estimasi Transit</th>';
          sOut +=                  '</tr>';
          var no=0;
          for(i=0;i<tableData.length;i++){
            no++;
          sOut +=                      '<tr>';
          sOut +=                        '<td>'+no+'</td>';
          sOut +=                        '<td>'+tableData[i]["pelabuhans"]["nama_pelabuhan"]+'</td>';
          sOut +=                        '<td>'+tableData[i]["est_transit"]+' Hari</td>';
          sOut +=                      '</tr>';
          }
          sOut +=                '</table>';
=======
      var sOut = '<table class="table table-striped">';
          sOut +='                  <tr>';
          sOut +='                    <th  style="text-align: center;">No.</th>';
          sOut +='                    <th  style="text-align: center;">Nama Pelabuhan</th>';
          sOut +='                    <th  style="text-align: center;">Estimasi Transit</th>';
          sOut +='                  </tr>';
      var no = 0;
                            @foreach($transits as $transit)
                            no++;
          sOut +='                      <tr>';
          sOut +='                        <td>'+no+'</td>';
                                            @foreach($pelabuhans as $pelabuhan)
                                              @if($transit->id_pelabuhan==$pelabuhan->id_pelabuhan)
          sOut +='                                      <td>{{ $pelabuhan->nama_pelabuhan }}</td>';
                                              @endif
                                            @endforeach
          sOut +='                        <td>{{ $transit->est_transit }}</td>';
          sOut +='                      </tr>';
                            @endforeach
          sOut +='                </table>';
>>>>>>> origin/master
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

      $('#example tr').each( function () {

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