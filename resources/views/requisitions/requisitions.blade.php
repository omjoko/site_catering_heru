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
                Manajemen Perencanaan Makanan
            </header>
            <div class="panel-body">
              @if($_GET['success']==1)
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Data Sudah Ada , Silahkan Pilih Perencanaan Makan Lainnya.</strong>
                    </div>
              @endif
              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <a href="/food-plans?success=3"><button class="btn btn-success" data-toggle="modal">
                              <span class="fa fa-plus-circle"></span> Tambah Data
                            </button></a>
                  </span>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th style="width: 5%;">No. Rekuisisi</th>
                        <th style="text-align: center;">Deskripsi</th>
                        <th style="text-align: center;">Vendor</th>
                        <th hidden=""></th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; use App\Http\Controllers\requisitionsController;?>
                    @foreach($requisitions as $requisition)
                    <?php $no++; ?>
                    <?php 
                        $DR = requisitionsController::sedot_detail($requisition->id);
                    ?>                                            
                      <tr class="gradeX">
                          <td>{{$no}}</td>
                          <td>
                             R{{$requisition->id}}
                          </td>
                          <td>
                             {{$requisition->deskripsi}}
                          </td>
                          <td>
                              {{$requisition->vendors['nama_vendor']}}
                          </td>
                          <?php $totals = array();?>
                          <td hidden="">
                                
                          </td>                          
                          <td>{{array_sum($totals)}}</td>
                          <td>
                              @if($requisition->status==0)
                              <span class="label label-primary label-mini"> Menunggu</span>
                              @elseif($requisition->status==1)
                              <span class="label label-danger label-mini"> Revisi</span>
                              @elseif($requisition->status==2)
                              <span class="label label-success label-mini"> Disetujui</span>
                              @endif
                          </td>
                          <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $requisition->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $requisition->id }}"><i class="fa fa-trash-o "></i></button>
                            <button class="btn btn-warning btn-xs" data-toggle="modal" href="#modalStatus{{ $requisition->id }}"><i class="fa fa-pencil "></i> Status</button>
                            @if($requisition->status==2)
                              <a href="/laporan_requisition?id={{ $requisition->id }}"><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalCetak" title="Cetak" style="background-color: orange;"><i class="fa fa-print"></i> Cetak</button></a>
                            @endif
                            <a href="/new-ingredients-requisitions?id={{ $requisition->id }}&id_pelayaran={{ $requisition->id_pelayaran }}"><button class="btn btn-success btn-xs" style="background-color: blue;"><i class="fa fa-plus"></i> Bahan</button></a>
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

@foreach($requisitions as $requisition)
 <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $requisition->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="id" value="{{ $requisition->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                          <select name="vendor" class="form-control">
                          @foreach($vendors as $vendor)
                            @if($requisition->vendors['id']==$vendor->id)
                              <option value="{{$vendor->id}}" selected="">{{$vendor->nama_vendor}}</option>
                            @else
                              <option value="{{$vendor->id}}">{{$vendor->nama_vendor}}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                          <textarea name="deskripsi" type="text" class="form-control" rows="5"  required>{{$requisition->deskripsi}}</textarea>
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
    <div class="modal fade" id="modalHapus{{ $requisition->id }}" tabindex="-1" role="dialog">
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
                <input type="hidden" name="id" value="{{ $requisition->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus Pengadaan dari vendor</p><p> <b>
                          {{$requisition->vendors['nama_vendor']}}
                             </b>?</p>
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

      <!-- Modal status -->
    <div class="modal fade" id="modalStatus{{ $requisition->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-warning">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Status</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $requisition->id }}">

                <div class="form-group">
                    <select name="status" class="form-control">
                    @if($requisition->status==0)
                      <option value="0" selected="">Menunggu</option>
                      <option value="1">Revisi</option>
                      <option value="2">Diterima</option>
                    @elseif($requisition->status==1)
                      <option value="0">Menunggu</option>
                      <option value="1" selected="">Revisi</option>
                      <option value="2">Diterima</option>
                    @elseif($requisition->status==2)
                      <option value="0">Menunggu</option>
                      <option value="1">Revisi</option>
                      <option value="2" selected="">Diterima</option>
                    @endif
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
          </div>
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /END modal status -->

  
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
      var sOut = '<table class="display table table-bordered table-striped table-hover">';
          sOut +='                  <tr>';
          sOut +='                    <th  style="text-align: center; width: 5%;">No.</th>';
          sOut +='                    <th  style="text-align: center;">Nama Bahan</th>';
          sOut +='                    <th  style="text-align: center;">Jumlah</th>';
          sOut +='                    <th  style="text-align: center;">Satuan</th>';
          sOut +='                    <th  style="text-align: center;">Harga</th>';
          sOut +='                    <th  style="text-align: center;">Total</th>';
          sOut +='                    <th  style="text-align: center; width: 10%"></th>';
          sOut +='                  </tr>';
      var no = 0;
                            @foreach($DR as $detail_requisition)
                            no++;
          sOut +='                      <tr>';
          sOut +='                        <td>'+no+'</td>';
          sOut +='                        <td>{{ $detail_requisition->ingredients[0]['nama'] }}</td>';
          sOut +='                        <td>{{ $detail_requisition->jumlah }}</td>';
          sOut +='                        {{ $detail_requisition->ingredients[0]->pembelian['satuan'] }}';
          sOut +='                        <td>{{ $detail_requisition->harga }}</td>';
                            <?php $total = $detail_requisition->jumlah*$detail_requisition->harga; ?>
          sOut +='                        <td>{{ $total }}</td>';
          sOut +='                      </tr>';
                            <?php $totals[] = $total;  ?>
                            @endforeach
          sOut +='                </table>';
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