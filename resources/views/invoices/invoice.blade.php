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
                Manajemen Menu
            </header>
            <div class="panel-body">
              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <button class="btn btn-success" data-toggle="modal" href="#modalTambah">
                              <span class="fa fa-plus-circle"></span> Tambah Data
                            </button>
                  </span>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th style="text-align: center;">Nama Menu</th>
                        <th style="text-align: center;">Tipe Menu</th>
                        <th style="text-align: center;"></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                        <th hidden=""></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;?>
                    @foreach($menus as $menu)
                    <?php $no++; ?>
                      <tr class="gradeX">
                          <td>{{$no}}</td>
                          <td>{{$menu->nama}}</td>
                          <td>
                              @if($menu->tipe == 0)
                              <span class="label label-danger label-mini"> Sarapan</span>
                              @elseif($menu->tipe==1)
                              <span class="label label-warning label-mini"> Makan Siang</span>
                              @elseif($menu->tipe==2)
                              <span class="label label-success label-mini"> Makan Malam</span>
                              @endif
                          </td>
                          <td>
                             <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $menu->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $menu->id }}"><i class="fa fa-trash-o "></i></button>
                          </td>
                          <td hidden="">
                                @foreach($menu_pembukas as $menu_pembuka)
                                    @if($menu->menu_pembuka==$menu_pembuka->id)
                                        {{$menu_pembuka->nama}}
                                    @endif
                                @endforeach                                
                          </td>
                          <td hidden="">
                                @foreach($menu_utamas as $menu_utama)
                                    @if($menu->menu_utama==$menu_utama->id)
                                        {{$menu_utama->nama}}
                                    @endif
                                @endforeach                                
                          </td>
                          <td hidden="">
                                @foreach($menu_penutups as $menu_penutup)
                                    @if($menu->menu_penutup==$menu_penutup->id)
                                        {{$menu_penutup->nama}}
                                    @endif
                                @endforeach                                
                          </td>
                          <td hidden="">
                                @foreach($minumans as $minuman)
                                    @if($menu->minuman==$minuman->id)
                                    {{$minuman->nama}}
                                    @endif
                                @endforeach
                                @foreach($minuman_bahan as $minumanbahan)
                                    @if($menu->minuman==$minumanbahan->id)
                                    {{$minumanbahan->nama}}
                                    @endif
                                @endforeach                              
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

 <!-- Modal tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Menu</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipe Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipe" required="">
                              <option value="0">Sarapan</option>
                              <option value="1">Makan Siang</option>                          
                              <option value="2">Makan Malam</option>                          
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Pembuka</label>
                        <div class="col-sm-10">
                            <select name="menu_pembuka" class="form-control">
                                @foreach($menu_pembukas as $menu_pembuka)
                                    <option value="{{$menu_pembuka->id}}">{{$menu_pembuka->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Utama</label>
                        <div class="col-sm-10">
                            <select name="menu_utama" class="form-control">
                                @foreach($menu_utamas as $menu_utama)
                                    <option value="{{$menu_utama->id}}">{{$menu_utama->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Penutup</label>
                        <div class="col-sm-10">
                            <select name="menu_penutup" class="form-control">
                                @foreach($menu_penutups as $menu_penutup)
                                    <option value="{{$menu_penutup->id}}">{{$menu_penutup->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Minuman</label>
                        <div class="col-sm-10">
                            <select name="minuman" class="form-control">
                                @foreach($minumans as $minuman)
                                    <option value="{{$minuman->id}}">{{$minuman->nama}}</option>
                                @endforeach
                                @foreach($minuman_bahan as $minumanbahan)
                                    <option value="{{$minumanbahan->id}}">{{$minumanbahan->nama}}</option>
                                @endforeach
                            </select>
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
  <!-- END modal tambah-->

@foreach($menus as $menu)
 <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Menu</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $menu->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" value="{{ $menu->nama }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipe Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipe" required="">
                            @if($menu->tipe==0)
                              <option value="0" selected="">Sarapan</option>
                              <option value="1">Makan Siang</option>                          
                              <option value="2">Makan Malam</option>                          
                            @elseif($menu->tipe==1)
                              <option value="0">Sarapan</option>
                              <option value="1" selected="">Makan Siang</option>                          
                              <option value="2">Makan Malam</option> 
                            @elseif($menu->tipe==2)
                              <option value="0">Sarapan</option>
                              <option value="1">Makan Siang</option>                          
                              <option value="2" selected="">Makan Malam</option> 
                            @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Pembuka</label>
                        <div class="col-sm-10">
                            <select name="menu_pembuka" class="form-control">
                                @foreach($menu_pembukas as $menu_pembuka)
                                    @if($menu->menu_pembuka==$menu_pembuka->id)
                                        <option value="{{$menu_pembuka->id}}" selected="">{{$menu_pembuka->nama}}</option>
                                    @else
                                        <option value="{{$menu_pembuka->id}}" >{{$menu_pembuka->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Utama</label>
                        <div class="col-sm-10">
                            <select name="menu_utama" class="form-control">
                                @foreach($menu_utamas as $menu_utama)
                                    @if($menu->menu_utama==$menu_penutup->id)
                                        <option value="{{$menu_utama->id}}" selected="">{{$menu_utama->nama}}</option>
                                    @else
                                        <option value="{{$menu_utama->id}}" >{{$menu_utama->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Menu Penutup</label>
                        <div class="col-sm-10">
                            <select name="menu_penutup" class="form-control">
                                @foreach($menu_penutups as $menu_penutup)
                                    @if($menu->menu_penutup==$menu_penutup->id)
                                        <option value="{{$menu_penutup->id}}" selected="">{{$menu_penutup->nama}}</option>
                                    @else
                                        <option value="{{$menu_penutup->id}}" >{{$menu_penutup->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Minuman</label>
                        <div class="col-sm-10">
                            <select name="minuman" class="form-control">
                                @foreach($minumans as $minuman)
                                    @if($menu->minuman==$minuman->id)
                                    <option value="{{$minuman->id}}" selected="">{{$minuman->nama}}</option>
                                    @else()
                                    <option value="{{$minuman->id}}" >{{$minuman->nama}}</option>
                                    @endif
                                @endforeach
                                @foreach($minuman_bahan as $minumanbahan)
                                @if($menu->minuman==$minumanbahan->id)
                                    <option value="{{$minumanbahan->id}}" selected="">{{$minumanbahan->nama}}</option>
                                    @else
                                    <option value="{{$minumanbahan->id}}">{{$minumanbahan->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
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
    <div class="modal fade" id="modalHapus{{ $menu->id }}" tabindex="-1" role="dialog">
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
                <input type="hidden" name="id" value="{{ $menu->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus Menu : <b>{{ $menu->nama }}</b>?</p>
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
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><th colspan="3" style="text-align:center;">Isi Menu</th></tr>';
      sOut += '<tr style="text-align:left;"><td>Menu Pembuka</td><td>:</td<<td"> <strong>'+aData[5]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Menu Utama</td><td>:</td<td"> <strong>'+aData[6]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Menu Penutup</td><td>:</td<td"> <strong>'+aData[7]+'</strong> </td></tr>';
      sOut += '<tr style="text-align:left;"><td>Minuman</td><td>:</td<td"> <strong>'+aData[8]+'</strong> </td></tr>';
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