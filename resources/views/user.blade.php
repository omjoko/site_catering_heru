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
              	User Management
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th>Privilege</th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $no => $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telepon }}</td>
                        @if($user->privilege==1)
                          <td><span class="label label-warning label-mini">steward</span></td>
                        @elseif($user->privilege==2)
                          <td><span class="label label-success label-mini">finance</span></td>
                        @elseif($user->privilege==3)
                          <td><span class="label label-danger label-mini">captain</span></td>
                        @elseif($user->privilege==4)
                          <td><span class="label label-primary label-mini">manager</span></td>
                        @else
                          <td><span class="label label-info label-mini">admin</span></td>
                        @endif
                        <td hidden="">{{ $user->email1 }}</td>
                        <td hidden="">{{ $user->no_nrp }}</td>
                        <td hidden="">{{ $user->no_bk }}</td>
                        <td hidden="">{{ $user->no_sijil }}</td>
                        <td hidden="">{{ $user->sertifikat }}</td>
                        <td hidden="">{{ $user->tgl_valid }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $user->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $user->id }}"><i class="fa fa-trash-o "></i></button>
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
                  <h4 class="modal-title">Tambah User</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/user') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama*</label>
                        <div class="col-sm-10">
                          <input name="name" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username*</label>
                        <div class="col-sm-10">
                            <input name="email" type="text" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email1" type="email" placeholder="" class="form-control">
                            <span class="help-inline">johndoe@domain.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password*</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" placeholder="" class="form-control" required="">
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
                        <label class="col-sm-2 control-label">No. NRP</label>
                        <div class="col-sm-10">
                            <input name="no_nrp" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. BK</label>
                        <div class="col-sm-10">
                            <input name="no_bk" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Sijil</label>
                        <div class="col-sm-10">
                            <input name="no_sijil" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sertifikat</label>
                        <div class="col-sm-10">
                            <input name="sertifikat" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Valid</label>
                        <div class="col-sm-10">
                            <input name="tgl_valid" type="text" placeholder="" data-mask="9999-99-99" class="form-control">
                            <span class="help-inline">yyyy-mm-dd</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privilege*</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Requisition, PO, and Voyage Planning | Input: Waste"> Steward </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Invoice"> Finance </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios3" value="3">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="View: Inventory and Waste | Input: Invoice | Approve: Inventory Out"> Captain </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios4" value="4">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Approve: Requisition, PO and Invoice | View: Report"> Manager </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios5" value="5">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage & View: All"> Admin </span>
                                </label>
                            </div>
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

  @foreach($users as $no => $user)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah User</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" action="{{ url('/user') }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama*</label>
                        <div class="col-sm-10">
                          <input name="name" type="text" placeholder="" class="form-control" required="" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username*</label>
                        <div class="col-sm-10">
                            <input name="email" type="text" placeholder="" class="form-control" required="" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email1" type="email" placeholder="" class="form-control" value="{{ $user->email1 }}">
                            <span class="help-inline">johndoe@domain.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password*</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <input name="telepon" type="text" placeholder="" class="form-control" value="{{ $user->telepon }}">
                            <span class="help-inline">089693685702</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. NRP</label>
                        <div class="col-sm-10">
                            <input name="no_nrp" type="text" placeholder="" class="form-control" value="{{ $user->no_nrp }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. BK</label>
                        <div class="col-sm-10">
                            <input name="no_bk" type="text" placeholder="" class="form-control" value="{{ $user->no_bk }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Sijil</label>
                        <div class="col-sm-10">
                            <input name="no_sijil" type="text" placeholder="" class="form-control" value="{{ $user->no_sijil }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sertifikat</label>
                        <div class="col-sm-10">
                            <input name="sertifikat" type="text" placeholder="" class="form-control" value="{{ $user->sertifikat }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Valid</label>
                        <div class="col-sm-10">
                            <input name="tgl_valid" type="text" placeholder="" data-mask="9999-99-99" class="form-control" value="{{ $user->tgl_valid }}">
                            <span class="help-inline">yyyy-mm-dd</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privilege*</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios1" value="1" checked>
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Requisition, PO, and Voyage Planning | Input: Waste"> Steward </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios2" value="2">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Invoice"> Finance </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios3" value="3">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="View: Inventory and Waste | Input: Invoice | Approve: Inventory Out"> Captain </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios4" value="4">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Approve: Requisition, PO and Invoice | View: Report"> Manager </span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="privilege" id="optionsRadios5" value="5">
                                    <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage & View: All"> Admin </span>
                                </label>
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
    <div class="modal fade" id="modalHapus{{ $user->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $user->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus akun <b>{{ $user->email }}</b>?</p>
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
      sOut += '<tr><td>Email:</td><td>'+aData[5]+'</td></tr>';
      sOut += '<tr><td>No. NRP:</td><td>'+aData[6]+'</td></tr>';
      sOut += '<tr><td>No. BK:</td><td>'+aData[7]+'</td></tr>';
      sOut += '<tr><td>No. Sijil:</td><td>'+aData[8]+'</td></tr>';
      sOut += '<tr><td>Sertifikat:</td><td>'+aData[9]+'</td></tr>';
      sOut += '<tr><td>Tanggal Valid:</td><td>'+aData[10]+'</td></tr>';
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