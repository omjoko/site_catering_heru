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
              	Manajemen Penyimpanan Keluar
          	</header>
          	<div class="panel-body">
              <div class="container-fluid">
                  <div class="container-fluid">
                  <span class="pull-left">
                    <a href="laporan_inventory"><button class="btn btn-primary" data-toggle="modal">
                      <span class="fa fa-print"></span> Cetak
                    </button></a>
                  </span>
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
                        <th style="width: 10%;">No.</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Tanggal</th>
                        <th>No.Rekuisisi</th>
                        <th style="width: 10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    @foreach($inventorys as $inventory)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $inventory->ingredients['nama'] }}</td>
                        <td>{{ $inventory->jumlah }}</td>
                        <td>{{ $inventory->ingredients->pembelian['satuan']}}</td>
                        <td>{{ $inventory->created_at }}</td>
                        <td>R{{ $inventory->id_req }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $inventory->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $inventory->id }}"><i class="fa fa-trash-o "></i></button>
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
                  <h4 class="modal-title">Tambah Penyimpanan Keluar</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="id_bahan" required="">
                          @foreach($ingredients as $ingredient)
                            <option value="{{$ingredient->id}}">{{$ingredient->nama}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-10">
                        <input type="number" name="jumlah" min="0" required="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">No. Rekuisisi</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="id_req" required="">
                          @foreach($requisitions as $requisition)
                            <option value="{{$requisition->id}}">R{{$requisition->id}}</option>
                          @endforeach
                        </select>
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

  @foreach($inventorys as $inventory)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $inventory->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Penyimpanan Keluar</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $inventory->id }}">

                    <form action="#" class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="id_bahan" required="">
                          @foreach($ingredients as $ingredient)
                          @if($inventory->id_bahan==$ingredient->id)
                            <option value="{{$ingredient->id}}" selected="">{{$ingredient->nama}}</option>
                          @else
                            <option value="{{$ingredient->id}}">{{$ingredient->nama}}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-10">
                        <input type="number" name="jumlah" min="0" required="" class="form-control" value="{{$inventory->jumlah}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">No. Rekuisisi</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="id_req" required="">
                          @foreach($requisitions as $requisition)
                            @if($inventory->id_req==$requisition->id)
                              <option value="{{$requisition->id}}" selected="">R{{$requisition->id}}</option>
                            @else 
                              <option value="{{$requisition->id}}">R{{$requisition->id}}</option>
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
    <div class="modal fade" id="modalHapus{{ $inventory->id }}" tabindex="-1" role="dialog">
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
                <input type="hidden" name="id" value="{{ $inventory->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus kategori : <b>{{ $inventory->ingredients['nama'] }}</b>?</p>
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

      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#hidden-table-info').dataTable( {
              } );
          } );
      </script>
@endpush