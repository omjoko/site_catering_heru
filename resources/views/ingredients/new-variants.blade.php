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
                Tambahkan Variasi Bahan
            </header>
            <div class="panel-body">
                <div class="form-group" style="margin-bottom: 50px;">
                    <table>
                      <tr>
                        <td><h4>Nama bahan</h4></td>
                        <td style="padding-left: 15px; padding-right: 15px;"><h4>:</h4></td>
                        <td style="color: red;"><h4><strong>{{$ingredients->nama}}</strong></h4></td>
                      </tr>
                      <tr>
                        <td><h4>Deskripsi</h4></td>
                        <td style="padding-left: 15px; padding-right: 15px;"><h4>:</h4></td>
                        <td style="color: red;"><h4><strong>{{$ingredients->deskripsi}}</strong></h4></td>
                      </tr>
                    </table>
                </div>
	              <form class="form-horizontal tasi-form" method="post">
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Variasi Bahan</label>
	                  <div class="col-sm-10">
	                      <input type="text" class="form-control" name="nama">
	                  </div>
	              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Bahan Utama</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="bahan_utama" value="1" checked>
                                <span> Ya </span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="bahan_utama" value="0">
                                <span> Tidak </span>
                            </label>
                        </div>
                    </div>
                </div>
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
	                  <div class="col-sm-10">
                        <textarea name="deskripsi" class="form-control" rows="5"></textarea>
	                  </div>
	              </div>
	              <div class="form-group">
	              		 <span class="pull-right" style="margin-right: 10px;">
	              		 <button class="btn btn-success" type="submit" data-toggle="modal">
                               Tambah Data <span class="fa fa-chevron-right"></span>
                            </button>
                      </span>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="id_bahan" value="{{$ingredients->id}}">
                </form>
                      <span class="pull-left" style="margin-left: 10px;">
                           <a href="/ingredients"><button type="button" class="btn btn-danger" data-toggle="modal">
                                    <span class="fa fa-chevron-left"></span> Kembali
                                  </button></a>
                         </span>
	              </div>
                <div class="container-fluid">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-advance table-hover" id="hidden-table-info">
                          <thead>
                          <tr>
                              <th style="width: 5%;">No.</th>
                              <th>Variasi bahan</th>
                              <th>Bahan utama</th>
                              <th>Deskripsi</th>
                              <th style="width: 10%"></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0; ?>
                          @foreach($variants as $variant)
                          <?php $no++ ?>
                          <tr>
                              <td>{{ $no }}</td>
                              <td>{{ $variant->nama }}</td>
                              <td>
                                  @if($variant->bahan_utama == 0)
                                  <span class="label label-danger label-mini"> Tidak</span>
                                  @else
                                  <span class="label label-success label-mini"> Ya</span>
                                  @endif
                              </td>
                              <td>{{ $variant->deskripsi }}</td>
                              <td>
                                  <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{$variant->id}}"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{$variant->id}}"><i class="fa fa-trash-o "></i></button>
                              </td>
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

  @foreach($variants as $no => $variant)
  <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $variant->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Varian</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_varian" value="{{ $variant->id }}">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Variasi Bahan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{$variant->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Bahan Utama</label>
                            <div class="col-sm-10">
                              @if($variant->bahan_utama==1)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="bahan_utama" value="1" checked>
                                        <span> Ya </span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="bahan_utama" value="0">
                                        <span> Tidak </span>
                                    </label>
                                </div>
                                @else
                                  <div class="radio">
                                    <label>
                                        <input type="radio" name="bahan_utama" value="1">
                                        <span> Ya </span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="bahan_utama" value="0" checked>
                                        <span> Tidak </span>
                                    </label>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" rows="5">{{$variant->deskripsi}}</textarea>
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
    <div class="modal fade" id="modalHapus{{ $variant->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" >
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_varian" value="{{ $variant->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus varian : <b>{{ $variant->nama }}</b>?</p>
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