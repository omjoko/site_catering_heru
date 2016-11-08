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
                    @if($_GET['success']==0)
                    <div class="alert alert-block alert-info fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        Silahkan Pilih <strong>PERENCANAAN PELAYARAN</strong> yang akan kamu tambahkan <strong>PERENCANAAN MAKANAN nya.</strong></a>
                    </div>
                    @elseif($_GET['success']==2)
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Data Sudah Ada , Silahkan Periksa Pada tabel</strong>
                    </div>
                    @endif

              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <a href="/food-plans?success=0"><button class="btn btn-success" data-toggle="modal">
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
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Durasi</th>
                        <th style="text-align: center;">Total Penumpang</th>
                        <th></th>
                        <th hidden=""></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; use App\Http\Controllers\foodplansController;?>
                    @foreach($voyages as $voyage)
                    <?php $no++; ?>
                    <?php 
                        $FP = foodplansController::sedotFP($voyage->id);
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
                          <td>{{$voyage->est_rute}} Hari</td>
                          <td><?php $total = $voyage->eksekutif+$voyage->bisnis+$voyage->ekonomi1+$voyage->ekonomi2; echo $total; ?></td>
                          <td>
                             @if($_GET['success']==0)
                                <a href="/new-food-plans?id={{ $voyage->id }}"><button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Perencanaan Makanan</button></a>
                            @endif
                            <a href="/new-food-plans?id={{ $voyage->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-star"></i> Requisition</button></a>
                          </td>
                          <td hidden="">
                                <table cellpadding="0" cellspacing="0" border="10" class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                                  <tr>
                                    <th  style="text-align: center; background-color: gray; color: white;"></th>
                                    <th style="text-align: center; background-color: gray; color: white;">EKSEKUTIF</th>
                                    <th style="text-align: center; background-color: gray; color: white;">BISNIS</th>
                                    <th style="text-align: center; background-color: gray; color: white;">EKONOMI 1</th>
                                    <th style="text-align: center; background-color: gray; color: white;">EKONOMI 2</th>
                                  </tr>
                                  @foreach($FP as $f)
                                  <tr>
                                    <td style="background-color: #FF6C60; color: white;">
                                    <a href="edit-food-plans?hari={{$f->hari}}&id={{ $voyage->id }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah Plan</button></a>

                                    <a href="delete-food-plans?hari={{$f->hari}}&id={{ $voyage->id }}"><button class="btn btn-warning btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                    <td colspan="4" style="background-color: #FF6C60; color: white;">Hari Ke-{{$f->hari}}</td>
                                  </tr>
                                  <tr>
                                    <td style="background-color: gray; color: white;">SARAPAN</td>
                                    <td>
                                    @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_eksekutif)
                                          {{$sarapan->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_bisnis)
                                          {{$sarapan->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_ekonomi1)
                                          {{$sarapan->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_ekonomi2)
                                          {{$sarapan->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                  </tr>
                                  <tr>
                                    <td  style="background-color: gray; color: white;">MAKAN SIANG</td>
                                    <td>
                                      @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_eksekutif)
                                          {{$siang->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_bisnis)
                                          {{$siang->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_ekonomi1)
                                          {{$siang->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_ekonomi2)
                                          {{$siang->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                  </tr>
                                  <tr>
                                    <td  style="background-color: gray; color: white;">MAKAN MALAM</td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_eksekutif)
                                          {{$malam->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_bisnis)
                                          {{$malam->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                     @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_ekonomi1)
                                          {{$malam->nama}}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_ekonomi2)
                                          {{$malam->nama}}
                                      @endif
                                    @endforeach
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
      var sOut = aData[8];


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