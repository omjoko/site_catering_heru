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
              	Kapal Management
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
                        <th>Nama Kapal</th>
                        <th>Tipe Kapal</th>
                        <th>No. IMO</th>
                        <th>Kapasitas</th>
                        <th></th>
                        <th hidden=""></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php use App\Http\Controllers\KapalController; $ke=0; $arrayStore= array(); ?>
                    @foreach($kapals as $no => $kapal)
                    <?php 
                        $storages = KapalController::storageData($kapal->id);
                        $arrayStore[] = $storages;
                    ?>
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $kapal->nama_kapal }}</td>
                        @if($kapal->tipe_kapal==1)
                          <td><span class="label label-primary label-mini">Kapal Feri</span></td>
                        @elseif($kapal->tipe_kapal==2)
                          <td><span class="label label-info label-mini">Kapal Diesel</span></td>
                        @else
                          <td><span class="label label-inverse label-mini">Kapal Tanker</span></td>
                        @endif
                        <td>{{ $kapal->no_imo }}</td>
                        <td>{{ $kapal->kapasitas }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $kapal->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $kapal->id }}"><i class="fa fa-trash-o "></i></button>
                            <a href="/storages?id={{ $kapal->id }}"><button class="btn btn-success btn-xs" data-toggle="modal"><i class="fa fa-plus"></i> Penyimpanan</button></a>
                        </td>
                        <td hidden="">
                          {{$ke}}
                        </td>
                    </tr>
                    <?php $ke++; ?>
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

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/kapal') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Kapal*</label>
                        <div class="col-sm-10">
                          <input name="nama_kapal" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe Kapal</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_kapal" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip"> Kapal Feri </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_kapal" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip"> Kapal Diesel </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_kapal" id="optionsRadios3" value="3">
                                    <span class="tooltips" data-toggle="tooltip"> Kapal Tanker </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. IMO</label>
                        <div class="col-sm-10">
                            <input name="no_imo" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input name="kapasitas" type="text" placeholder="" class="form-control">
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

  @foreach($kapals as $no => $kapal)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $kapal->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/kapal') }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $kapal->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Kapal*</label>
                        <div class="col-sm-10">
                          <input name="nama_kapal" type="text" placeholder="" class="form-control" required="" value="{{ $kapal->nama_kapal }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe Kapal</label>
                        <div class="col-sm-10">
                            @if($kapal->tipe_kapal==1)
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios1" value="1" checked>
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Feri </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios2" value="2">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Diesel </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios3" value="3">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Tanker </span>
                                      </label>
                                  </div>                            
                            @elseif($kapal->tipe_kapal==2)
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios1" value="1">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Feri </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios2" value="2" checked="">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Diesel </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios3" value="3">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Tanker </span>
                                      </label>
                                  </div>     
                            @elseif($kapal->tipe_kapal==3)
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios1" value="1">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Feri </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios2" value="2">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Diesel </span>
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="tipe_kapal" id="optionsRadios3" value="3" checked="">
                                          <span class="tooltips" data-toggle="tooltip"> Kapal Tanker </span>
                                      </label>
                                  </div>     
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. IMO</label>
                        <div class="col-sm-10">
                            <input name="no_imo" type="text" placeholder="" class="form-control" value="{{ $kapal->no_imo }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kapasistas</label>
                        <div class="col-sm-10">
                            <input name="kapasitas" type="text" placeholder="" class="form-control" value="{{ $kapal->kapasitas }}">
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
    <div class="modal fade" id="modalHapus{{ $kapal->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/kapal') }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $kapal->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus akun <b>{{ $kapal->nama_kapal }}</b>?</p>
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
      var kes = aData[7];
      var arrayStore = <?php echo json_encode($arrayStore);?>;
      var tableData = arrayStore[kes];
      console.log(arrayStore[kes]);
      // var sOut = kes;
      var sOut = '<table class="table table-striped" style="text-align: center;">';
          sOut +=                     '<tr>';
          sOut +=                       '<th style="text-align: center; background-color:gray; color:white;">No.</th>';
          sOut +=                      '<th style="text-align: center; background-color:gray; color:white;">Nama Penyimpanan</th>';
          sOut +=                        '<th style="text-align: center; background-color:gray; color:white;">Tipe Penyimpanan</th>';
          sOut +=                      '</tr>';
          var no = 0;
          for(i=0;i<tableData.length;i++){
            no++;
          sOut +=                          '<tr>';
          sOut +=                            '<td>'+no+'</td>';
          sOut +=                            '<td>'+tableData[i]["nama"]+'</td>';
            if(tableData[i]["tipe"]==0){
            sOut +=                                  '<td><span class="label label-primary label-mini">Freezer</span></td>';
            } else if(tableData[i]["tipe"]==1) {
            sOut +=                                  '<td><span class="label label-info label-mini">Gudang Utama</span></td>';
            } else if(tableData[i]["tipe"]==2) {
            sOut +=                                  '<td><span class="label label-inverse label-mini">Gudang Biasa</span></td>';
            }
          sOut +=                          '</tr>';
          } 
          sOut +=                    '</table>';

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