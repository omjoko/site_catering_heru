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
                    @elseif($_GET['success']==3)
                    <div class="alert alert-block alert-info fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Silahkan Pilih <strong>PERENCANAAN MAKANAN</strong> yang akan di <strong>Requisition!</strong>
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
                        <th style="text-align: center;">Nama Pelayaran</th>
                        <th style="text-align: center;">Asal</th>
                        <th style="text-align: center;">Tujuan</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Durasi</th>
                        <th style="text-align: center;">Total Penumpang</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; use App\Http\Controllers\foodplansController;?>
                    @foreach($voyages as $voyage)
                    <?php $no++; ?>
                    <?php 
                        $FP = foodplansController::sedotFP($voyage->id);
                        $vendors = foodplansController::sedotVendor();
                    ?>                                            
                      <tr class="gradeX">
                          <td>{{$no}}</td>
                          <td>{{$voyage->nama}}</td>
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
                          <td>{{$voyage->rutes->est_rute}} Hari</td>
                          <td><?php $total = $voyage->eksekutif+$voyage->bisnis+$voyage->ekonomi1+$voyage->ekonomi2; echo $total; ?></td>
                          <td>
                             @if($_GET['success']==0)
                                <a href="/new-food-plans?id={{ $voyage->id }}"><button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Perencanaan Makanan</button></a>
                            @endif
                            @if($_GET['success']==3)
                            <button class="btn btn-success btn-xs" data-toggle="modal" href="#ModalTambah{{ $voyage->id }}"><i class="fa fa-star "></i> Requisition</button>
                            @endif
<<<<<<< HEAD
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
                                          <a data-toggle="modal" href="#ModalSarapan{{$sarapan->id}}">{{$sarapan->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_bisnis)
                                          <a data-toggle="modal" href="#ModalSarapan{{$sarapan->id}}">{{$sarapan->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_ekonomi1)
                                          <a data-toggle="modal" href="#ModalSarapan{{$sarapan->id}}">{{$sarapan->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($sarapans as $sarapan)
                                      @if($sarapan->id==$f->sarapan_ekonomi2)
                                          <a data-toggle="modal" href="#ModalSarapan{{$sarapan->id}}">{{$sarapan->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                  </tr>
                                  <tr>
                                    <td  style="background-color: gray; color: white;">MAKAN SIANG</td>
                                    <td>
                                      @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_eksekutif)
                                            <a data-toggle="modal" href="#ModalSiang{{$siang->id}}">{{$siang->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_bisnis)
                                            <a data-toggle="modal" href="#ModalSiang{{$siang->id}}">{{$siang->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_ekonomi1)
                                            <a data-toggle="modal" href="#ModalSiang{{$siang->id}}">{{$siang->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($siangs as $siang)
                                      @if($siang->id==$f->siang_ekonomi2)
                                            <a data-toggle="modal" href="#ModalSiang{{$siang->id}}">{{$siang->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                  </tr>
                                  <tr>
                                    <td  style="background-color: gray; color: white;">MAKAN MALAM</td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_eksekutif)
                                            <a data-toggle="modal" href="#ModalMalam{{$malam->id}}">{{$malam->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_bisnis)
                                            <a data-toggle="modal" href="#ModalMalam{{$malam->id}}">{{$malam->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                     @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_ekonomi1)
                                            <a data-toggle="modal" href="#ModalMalam{{$malam->id}}">{{$malam->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                      @foreach($malams as $malam)
                                      @if($malam->id==$f->malam_ekonomi2)
                                            <a data-toggle="modal" href="#ModalMalam{{$malam->id}}">{{$malam->nama}}</a>
                                      @endif
                                    @endforeach
                                    </td>
                                  </tr>
                                  @endforeach
                                </table>
                          </td>                      
=======
                          </td>                  
>>>>>>> origin/master
                      </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </section>
    </div>
</div>

@foreach($sarapans as $sarapan)
 <!-- Modal sarapan -->
  <div class="modal fade" id="ModalSarapan{{ $sarapan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Menu {{$sarapan->nama}}</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pelayaran" value="{{$voyage->id}}">
                  <?php 
                    $pembuka = foodplansController::sedotMResep($sarapan->menu_pembuka);
                    $utama = foodplansController::sedotMResep($sarapan->menu_utama); 
                    $penutup = foodplansController::sedotMResep($sarapan->menu_penutup); 
                    $minuman = foodplansController::sedotMResep($sarapan->minuman); 
                    if ($minuman==null) {
                      $minuman = foodplansController::sedotMBahan($sarapan->minuman);
                    }
                  ?>

                  <table cellpadding="0" cellspacing="0" border="10" class="display table table-bordered" style="text-align: center;">
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Pembuka</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Utama</th>                        
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($pembuka->nama==null)@else{{$pembuka->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($utama->nama==null)@else{{$utama->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                        <td>@if($pembuka->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$pembuka->gambar}}" height="150" width="150">@endif</td>
                        <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$utama->gambar}}" height="150" width="150">@endif</td>
                      </tr>
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Penutup</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Minuman</th>
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($penutup->nama==null)@else{{$penutup->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($minuman->nama==null)@else{{$minuman->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                         <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$penutup->gambar}}" height="150" width="150">@endif</td>
                        @if($minuman->gambar==null)
                          <td><img class="img" src="img/noimagefound.jpg" height="150" width="150"></td>
                        @else
                          <td><img class="img" src="{{$minuman->gambar}}" height="150" width="150"></td>
                        @endif
                      </tr>
                  </table>

                    <div class="modal-footer">
                    </div>
                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal sarapan-->    
@endforeach

@foreach($siangs as $siang)
 <!-- Modal siang -->
  <div class="modal fade" id="ModalSiang{{ $siang->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Menu {{$siang->nama}}</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pelayaran" value="{{$voyage->id}}">
                  <?php 
                    $pembuka = foodplansController::sedotMResep($siang->menu_pembuka);
                    $utama = foodplansController::sedotMResep($siang->menu_utama); 
                    $penutup = foodplansController::sedotMResep($siang->menu_penutup); 
                    $minuman = foodplansController::sedotMResep($siang->minuman); 
                    if ($minuman==null) {
                      $minuman = foodplansController::sedotMBahan($siang->minuman);
                    }
                  ?>

                  <table cellpadding="0" cellspacing="0" border="10" class="display table table-bordered" style="text-align: center;">
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Pembuka</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Utama</th>                        
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($pembuka->nama==null)@else{{$pembuka->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($utama->nama==null)@else{{$utama->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                        <td>@if($pembuka->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$pembuka->gambar}}" height="150" width="150">@endif</td>
                        <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$utama->gambar}}" height="150" width="150">@endif</td>
                      </tr>
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Penutup</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Minuman</th>
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($penutup->nama==null)@else{{$penutup->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($minuman->nama==null)@else{{$minuman->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                        <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$penutup->gambar}}" height="150" width="150">@endif</td>
                        @if($minuman->gambar==null)
                          <td><img class="img" src="img/noimagefound.jpg" height="150" width="150"></td>
                        @else
                          <td><img class="img" src="{{$minuman->gambar}}" height="150" width="150"></td>
                        @endif
                      </tr>
                  </table>
                    
                    
                    
                    <div class="modal-footer">
                    </div>
                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal siang-->    
@endforeach

@foreach($malams as $malam)
 <!-- Modal malam -->
  <div class="modal fade" id="ModalMalam{{ $malam->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Menu {{$malam->nama}}</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pelayaran" value="{{$voyage->id}}">
                  <?php 
                    $pembuka = foodplansController::sedotMResep($malam->menu_pembuka);
                    $utama = foodplansController::sedotMResep($malam->menu_utama); 
                    $penutup = foodplansController::sedotMResep($malam->menu_penutup); 
                    $minuman = foodplansController::sedotMResep($malam->minuman); 
                    if ($minuman==null) {
                      $minuman = foodplansController::sedotMBahan($malam->minuman);
                    }
                  ?>

                  <table cellpadding="0" cellspacing="0" border="10" class="display table table-bordered" style="text-align: center;">
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Pembuka</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Utama</th>                        
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($pembuka->nama==null)@else{{$pembuka->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($utama->nama==null)@else{{$utama->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                        <td>@if($pembuka->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$pembuka->gambar}}" height="150" width="150">@endif</td>
                        <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$utama->gambar}}" height="150" width="150">@endif</td>
                      </tr>
                      <tr>
                        <th  style="text-align: center; background-color: gray; color: white;">Menu Penutup</th>
                        <th  style="text-align: center; background-color: gray; color: white;">Minuman</th>
                      </tr>
                      <tr>
                        <td style="color:red; font-size: medium;"><u><strong>@if($penutup->nama==null)@else{{$penutup->nama}}@endif</strong></u></td>
                        <td style="color:red; font-size: medium;"><u><strong>@if($minuman->nama==null)@else{{$minuman->nama}}@endif</strong></u></td>
                      </tr>
                      <tr>
                        <td>@if($utama->gambar==null)<img class="img" src="img/noimagefound.jpg" height="150" width="150">@else<img class="img" src="{{$penutup->gambar}}" height="150" width="150">@endif</td>
                        @if($minuman->gambar==null)
                          <td><img class="img" src="img/noimagefound.jpg" height="150" width="150"></td>
                        @else
                          <td><img class="img" src="{{$minuman->gambar}}" height="150" width="150"></td>
                        @endif
                      </tr>
                  </table>
                    
                    
                    
                    <div class="modal-footer">
                    </div>
                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal malam-->    
@endforeach

@foreach($voyages as $voyage)
 <!-- Modal Tambah -->
  <div class="modal fade" id="ModalTambah{{ $voyage->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Requisition</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pelayaran" value="{{$voyage->id}}">


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                          <select name="vendor" class="form-control" required="">
                          @foreach($vendors as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->nama_vendor}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                          <textarea name="deskripsi" type="text" class="form-control" rows="5" required=""></textarea>
                        </div>
                    </div>
                    
                    <!-- status masih menunggu -->
                    <input type="hidden" name="status" value="0">
                    <!-- status masih menunggu -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>

              </div>
          </div>
      </div>
  </div>
  <!-- END modal tambah-->
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
<<<<<<< HEAD
      var sOut = aData[9];
=======
        @foreach($voyages as $voyage)
        <?php 
            $FP = foodplansController::sedotFP($voyage->id);
            $vendors = foodplansController::sedotVendor();
        ?>                                            
      var sOut = '<table cellpadding="0" cellspacing="0" border="10" class="display table table-bordered" style="text-align: center;">';
          sOut +='                  <tr>';
          sOut +='                    <th style="text-align: center; background-color: gray; color: white;"></th>';
          sOut +='                    <th style="text-align: center; background-color: gray; color: white;">EKSEKUTIF</th>';
          sOut +='                    <th style="text-align: center; background-color: gray; color: white;">BISNIS</th>';
          sOut +='                    <th style="text-align: center; background-color: gray; color: white;">EKONOMI 1</th>';
          sOut +='                    <th style="text-align: center; background-color: gray; color: white;">EKONOMI 2</th>';
          sOut +='                  </tr>';
                            @foreach($FP as $f)
          sOut +='                      <tr>';
          sOut +='                        <td style="background-color: #FF6C60; color: white;">';
          sOut +='                        <a href="edit-food-plans?hari={{ $f->hari }}&id={{ $voyage->id }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah Plan</button></a>';
          sOut +='                        <a href="delete-food-plans?hari={{ $f->hari }}&id={{ $voyage->id }}"><button class="btn btn-warning btn-xs"><i class="fa fa-trash-o "></i></button></a>';
          sOut +='                        </td>';
          sOut +='                        <td colspan="4" style="background-color: #FF6C60; color: white;">Hari Ke-{{ $f->hari }}</td>';
          sOut +='                      </tr>';
          sOut +='                      <tr>';
          sOut +='                        <td style="background-color: gray; color: white;">SARAPAN</td>';
                                          @foreach($sarapans as $sarapan)
                                            @if($sarapan->id==$f->sarapan_eksekutif)
          sOut +='                        <td>{{ $sarapan->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($sarapans as $sarapan)
                                            @if($sarapan->id==$f->sarapan_bisnis)
          sOut +='                        <td>{{ $sarapan->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($sarapans as $sarapan)
                                            @if($sarapan->id==$f->sarapan_ekonomi1)
          sOut +='                        <td>{{ $sarapan->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($sarapans as $sarapan)
                                            @if($sarapan->id==$f->sarapan_ekonomi2)
          sOut +='                        <td>{{ $sarapan->nama }}</td>';
                                            @endif
                                          @endforeach
          sOut +='                      </tr>';
          sOut +='                      <tr>';
          sOut +='                        <td style="background-color: gray; color: white;">MAKAN SIANG</td>';
                                          @foreach($siangs as $siang)
                                            @if($siang->id==$f->siang_eksekutif)
          sOut +='                        <td>{{ $siang->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($siangs as $siang)
                                            @if($siang->id==$f->siang_bisnis)
          sOut +='                        <td>{{ $siang->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($siangs as $siang)
                                            @if($siang->id==$f->siang_ekonomi1)
          sOut +='                        <td>{{ $siang->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($siangs as $siang)
                                            @if($siang->id==$f->siang_ekonomi2)
          sOut +='                        <td>{{ $siang->nama }}</td>';
                                            @endif
                                          @endforeach
          sOut +='                      </tr>';
          sOut +='                      <tr>';
          sOut +='                        <td style="background-color: gray; color: white;">MAKAN MALAM</td>';
                                          @foreach($malams as $malam)
                                            @if($malam->id==$f->malam_eksekutif)
          sOut +='                        <td>{{ $malam->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($malams as $malam)
                                            @if($malam->id==$f->malam_bisnis)
          sOut +='                        <td>{{ $malam->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($malams as $malam)
                                            @if($malam->id==$f->malam_ekonomi1)
          sOut +='                        <td>{{ $malam->nama }}</td>';
                                            @endif
                                          @endforeach
                                          @foreach($malams as $malam)
                                            @if($malam->id==$f->malam_ekonomi2)
          sOut +='                        <td>{{ $malam->nama }}</td>';
                                            @endif
                                          @endforeach
          sOut +='                      </tr>';
>>>>>>> origin/master

                            @endforeach
          sOut +='                </table>';

      return sOut;
      @endforeach
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