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
                Tambahkan Bahan Pengadaan
            </header>
            <div class="panel-body">
                <div class="row">
                  <div class="col-xs-6 col-sm-3">
                    <h5>Asal Pelabuhan :<strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$requisitions->voyages->rutes['asal'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong style="color: red;"></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Tujuan Pelabuhan : <strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$requisitions->voyages->rutes['tujuan'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Vendor : <strong style="color: red;">{{$rv->vendors['nama_vendor']}}</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>No.Rekuisisi : <strong style="color: red;">R{{$_GET['id']}}</strong></h5>
                  </div>
                </div>
                <div class="form-group">
                  <form class="form-horizontal tasi-form" method="post">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Bahan Makanan</label>
                    <div class="col-sm-10">
                        <select name="id_bahan" class="form-control">
                         @foreach($ingredients as $ingredient)
                            <option value="{{$ingredient->id}}">{{$ingredient->nama}}</option> 
                         @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                            <input type="number" name="jumlah" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                    <div class="col-sm-10">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">Rp. </span>
                                <input type="number" name="harga" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                     <span class="pull-right" style="margin-right: 10px;">
                     <button class="btn btn-success" type="submit" data-toggle="modal">
                               Tambah Data <span class="fa fa-chevron-right"></span>
                            </button>
                      </span>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="id_req" value="{{$_GET['id']}}">
                </form>
                      <span class="pull-left" style="margin-left: 10px;">
                           <a href="/requisitions?success=0"><button type="button" class="btn btn-danger" data-toggle="modal">
                                    <span class="fa fa-chevron-left"></span> Kembali
                                  </button></a>
                         </span>
                </div>
                <div class="container-fluid">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-advance table-hover" id="hidden-table-info">
                          <thead>
                          <tr>
                              <th style="width: 5%;">No.</th>
                              <th>Nama bahan</th>
                              <th>Jumlah</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                              <th>Total</th>
                              <th style="width: 10%"></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0; ?>
                          @foreach($detail_requisitions as $detail_requisition)
                          <?php $no++; ?>
                          <tr>
                              <td>{{ $no }}</td>
                              <td>{{ $detail_requisition->ingredients[0]['nama'] }}</td>
                              <td>{{ $detail_requisition->jumlah }}</td>
                              <td>
                                  {{ $detail_requisition->ingredients[0]->pembelian['satuan'] }}
                              </td>
                              <td>{{ $detail_requisition->harga }}</td>
                              <?php $total = $detail_requisition->jumlah*$detail_requisition->harga; ?>
                              <td>{{$total}}</td>
                              <td>
                                  <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{$detail_requisition->id}}"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{$detail_requisition->id}}"><i class="fa fa-trash-o "></i></button>
                              </td>
                                <!-- Modal update -->
                                <div class="modal fade" id="modalUbah{{ $detail_requisition->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Ubah Bahan Pengadaan </h4>
                                            </div>
                                            <div class="modal-body">

                                              <form action="#" class="form-horizontal" method="POST" >
                                                  <input type="hidden" name="_method" value="PUT">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <input type="hidden" name="id_req" value="{{ $detail_requisition->id }}">

                                                      <label class="control-label">Bahan Makanan</label>
                                                          <select name="id_bahan" class="form-control">
                                                           @foreach($ingredients as $ingredient)
                                                              <option value="{{$ingredient->id}}">{{$ingredient->nama}}</option> 
                                                           @endforeach
                                                          </select>
                                                      <label class="control-label">Jumlah</label>
                                                              <input type="number" name="jumlah" min="0" class="form-control" value="{{ $detail_requisition->jumlah }}">
                                                      <label class="control-label">Harga</label>
                                                              <div class="input-group">
                                                                  <span class="input-group-addon">Rp. </span>
                                                                  <input type="number" name="harga" min="0" class="form-control" value="{{ $detail_requisition->harga }}">
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
                                  <div class="modal fade" id="modalHapus{{ $detail_requisition->id }}" tabindex="-1" role="dialog">
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
                                              <input type="hidden" name="id_req" value="{{ $detail_requisition->id }}">

                                              <center>
                                                  <p>Apakah anda yakin ingin menghapus : <p><b>{{ $detail_requisition->ingredients[0]['nama'] }}</b>?</p></p>
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
                          </tr>
                          @endforeach
                          </tbody>
                      </table>                  
                </div>
                </div>
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


      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#hidden-table-info').dataTable( {
              } );
          } );
      </script>

@endpush