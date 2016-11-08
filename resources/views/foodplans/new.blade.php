@extends('layouts.layouts')

@push('css')
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
           <header class="panel-heading">
                Tambahkan Rencana Makanan
            </header>
            <div class="panel-body">              
                <div class="row">
                  <div class="col-xs-6 col-sm-3">
                    <h5>Asal Pelabuhan :<strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyages->rutes['asal'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong style="color: red;"></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Tujuan Pelabuhan : <strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyages->rutes['tujuan'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Keberangkatan : <strong style="color: red;">{{$voyages->keberangkatan}}</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Durasi : <strong style="color: red;">{{$voyages->rutes['est_rute']}} Hari</strong></h5>
                  </div>
                </div>
                <div class="row">
                    <table cellpadding="0" cellspacing="0" border="0"  class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                      <tr style="background-color: gray; color: white;">
                        <th></th>
                        <th style="text-align: center; font-size: 18px;">KELAS EKSEKUTIF</th>
                        <th style="text-align: center; font-size: 18px;">KELAS BISNIS</th>
                        <th style="text-align: center; font-size: 18px;">KELAS EKONOMI 1</th>
                        <th style="text-align: center; font-size: 18px;">KELAS EKONOMI 2</th>
                      </tr>
                      @for($i=0;$i<$voyages->rutes['est_rute'];$i++)
                        <form name="{{$i+1}}" class="form-horizontal tasi-form" method="post">
                          <tr>
                            <td colspan="5" style="background-color: #ff6c60; color: white;">Hari Ke-{{$i+1}}</td>
                          </tr>
                          <tr>
                            <td>Sarapan</td>
                            <td>
                              <select class="form-control" name="sarapan_eksekutif({{$i+1}})">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="sarapan_bisnis({{$i+1}})">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="sarapan_ekonomi1({{$i+1}})">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="sarapan_ekonomi2({{$i+1}})">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>                                                                        
                          </tr>
                          <tr>
                            <td>Makan Siang</td>
                            <td>
                              <select class="form-control" name="makansiang_eksekutif({{$i+1}})">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="makansiang_bisnis({{$i+1}})">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="makansiang_ekonomi1({{$i+1}})">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="makansiang_ekonomi2({{$i+1}})">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Makan Malam</td>
                            <td>
                              <select class="form-control" name="makanmalam_eksekutif({{$i+1}})">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="makanmalam_bisnis({{$i+1}})">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select class="form-control" name="makanmalam_ekonomi1({{$i+1}})">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>                                                
                            <td>
                              <select class="form-control" name="makanmalam_ekonomi2({{$i+1}})">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                              </select>
                            </td>                        
                          </tr>
                          <tr>
                            <td colspan="5">
                               {{$i+1}}
                               <span class="pull-right" style="margin-right: 10px;">
                               <button class="btn btn-success" type="submit" data-toggle="modal">
                                         Tambah Data <span class="fa fa-chevron-right"></span>
                                      </button>
                                </span>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </td>
                          </tr>
                        <input type="hidden" name="id_pelayaran" value="{{$_GET['id']}}">
                        <input type="hidden" name="hari" value="{{$i+1}}">
                          @endfor
                    </table>
                </div>
                </form>
            </div>
            </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('js')

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>

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


  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <!--script for this page-->
  <script src="js/form-component.js"></script>

@endpush