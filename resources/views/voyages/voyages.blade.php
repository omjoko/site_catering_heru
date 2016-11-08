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
                Manajemen Perencanaan Pelayaran
            </header>
            <div class="panel-body">
                    @if($_GET['success']==0)
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Rute</strong> yang kamu masuk kan tidak ditemukan! . Periksa kembali atau <a href="/rute">Tambahkan Rute Baru!</a>
                    </div>
                    @endif
              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <a href="/new-voyages?success=1"><button class="btn btn-success" data-toggle="modal">
                              <span class="fa fa-plus-circle"></span> Tambah Data
                            </button></a>
                  </span>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th style="text-align: center;">Asal</th>
                        <th style="text-align: center;">Tujuan</th>
                        <th style="text-align: center;">Keberangkatan</th>
                        <th style="text-align: center;">Kapal</th>
                        <th style="text-align: center;">Durasi</th>
                        <th style="text-align: center;">Total Penumpang</th>
                        <th></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; use App\Http\Controllers\voyagesController;?>
                    @foreach($voyages as $voyage)
                    <?php $no++; ?>
                    <?php 
                        $transits = voyagesController::DataTransit($voyage->id_rute);
                    ?>                    
                      <tr class="gradeX">
                          <td>{{$no}}</td>
                          <td>
                              @foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyage->rutes['asal'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach
                          </td>
                          <td>
                              @foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyage->rutes['tujuan'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach
                          </td>
                          <td>{{$voyage->keberangkatan}}</td>
                          <td>
                             @foreach($kapals as $kapal)
                                @if($kapal->id==$voyage->id_kapal)
                                 {{$kapal->nama_kapal}}
                                @endif
                              @endforeach
                          </td>
                          <td>{{$voyage->rutes['est_rute']}} Hari</td>
                          <td><?php $total = $voyage->eksekutif+$voyage->bisnis+$voyage->ekonomi1+$voyage->ekonomi2; echo $total; ?></td>
                          <td>
                             <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $voyage->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $voyage->id }}"><i class="fa fa-trash-o "></i></button>
                          </td>
                          <td hidden="">
                              {{$voyage->eksekutif}}                           
                          </td>
                          <td hidden="">          
                              {{$voyage->bisnis}}                  
                          </td>
                          <td hidden="">                            
                              {{$voyage->ekonomi1}}
                          </td>
                          <td hidden="">
                              {{$voyage->ekonomi2}}                  
                          </td>
                          <td hidden="">
                              <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="pull-left">
                                <tr>
                                  <td colspan="2">DAFTAR PEMBERHENTIAN</d>
                                </tr>
                                <tr>
                                  <th style="text-align:center;">Pemberhentian</th>
                                  <th style="text-align:center;">Durasi</th>
                                </tr>
                                  @foreach($transits as $transit)
                                  <tr style="text-align:left;">
                                    <td>
                                        @foreach($pelabuhans as $pelabuhan)
                                          @if($pelabuhan->id_pelabuhan==$transit->id_pelabuhan)
                                           {{$pelabuhan->nama_pelabuhan}}
                                          @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$transit->est_transit}} Hari
                                    </td>
                                  </tr>
                                  @endforeach
                              </table>
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


@foreach($voyages as $voyage)
 <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $voyage->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Perencanaan Pelayaran</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $voyage->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                        <div class="col-sm-10">
                            <select name="asal" class="form-control">
                            @foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyage->rutes['asal'])
                                 <option value="{{$pelabuhan->id_pelabuhan}}" selected="">{{$pelabuhan->nama_pelabuhan}}</option>
                                @else
                                 <option value="{{$pelabuhan->id_pelabuhan}}">{{$pelabuhan->nama_pelabuhan}}</option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-10">
                            <select name="tujuan" class="form-control">
                            @foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyage->rutes['tujuan'])
                                 <option value="{{$pelabuhan->id_pelabuhan}}" selected="">{{$pelabuhan->nama_pelabuhan}}</option>
                                @else
                                 <option value="{{$pelabuhan->id_pelabuhan}}">{{$pelabuhan->nama_pelabuhan}}</option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <?php $tgl = date("Y-m-d", strtotime($voyage->keberangkatan)) ?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Berangkat</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_keberangkatan" class="form-control" value="{{$tgl}}">
                        </div>
                    </div>
                    <?php $jam = substr($voyage->keberangkatan, 11); ?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jam Berangkat</label>
                        <div class="col-sm-10">
                            <input type="time" name="jam_keberangkatan" class="form-control" value="{{$jam}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kapal</label>
                        <div class="col-sm-10">
                            <select name="id_kapal" class="form-control">
                            @foreach($kapals as $kapal)
                                @if($kapal->id==$voyage->id_kapal)
                                  <option value="{{$kapal->id}}" selected="">{{$kapal->nama_kapal}}</option>
                                @else
                                  <option value="{{$kapal->id}}">{{$kapal->nama_kapal}}</option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="alert alert-block alert-info fade in">
                             <center><strong>DATA PENUMPANG</strong></center>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Eksekutif</label>
                        <div class="col-sm-10">
                            <input type="number" name="eksekutif" class="form-control" value="{{$voyage->eksekutif}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Bisnis</label>
                        <div class="col-sm-10">
                            <input type="number" name="bisnis" class="form-control" value="{{$voyage->bisnis}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Ekonomi 1</label>
                        <div class="col-sm-10">
                            <input type="number" name="ekonomi1" class="form-control" value="{{$voyage->ekonomi1}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Ekonomi 2</label>
                        <div class="col-sm-10">
                            <input type="number" name="ekonomi2" class="form-control" value="{{$voyage->ekonomi2}}">
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
    <div class="modal fade" id="modalHapus{{ $voyage->id }}" tabindex="-1" role="dialog">
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
                <input type="hidden" name="id" value="{{ $voyage->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus Perencanaan Pelayaran</p><p> <b>
                              @foreach($kapals as $kapal)
                                @if($kapal->id==$voyage->id_kapal)
                                 {{$kapal->nama_kapal}}
                                @endif
                              @endforeach => {{ $voyage->keberangkatan }} </b>?</p>
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
<!-- END MODAL COLLECTIONS -->
@endforeach
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
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="pull-right">';
      sOut += '<tr><th colspan="3" style="text-align:center;">Daftar Kelas Penumpang</th></tr>';
      sOut += '<tr style="text-align:left;"><td>Kelas Eksekutif</td><td>:</td<<td"> <strong>'+aData[9]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Kelas Bisnis</td><td>:</td<td"> <strong>'+aData[10]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Kelas Ekonomi 1</td><td>:</td<td"> <strong>'+aData[11]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Kelas Ekonomi 2</td><td>:</td<td"> <strong>'+aData[12]+'</strong> </td></tr>';
      sOut += '</table>';
      sOut += aData[13];

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