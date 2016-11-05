@extends('layouts.layouts')

@push('css')
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              User Management
          </header>
          <div class="panel-body">
              <form action="#" class="form-horizontal">
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" placeholder="" class="form-control">
                          <span class="help-inline">johndoe@domain.com</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                          <input type="password" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Telepon</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. NRP</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. BK</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Sijil</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Sertifikat</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Valid</label>
                      <div class="col-sm-10">
                          <input type="text" placeholder="" data-mask="9999-99-99" class="form-control">
                          <span class="help-inline">yyyy-mm-dd</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Privilege</label>
                      <div class="col-sm-10">
                          <div class="radio">
                              <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                                  <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Requisition, PO, and Voyage Planning | Input: Waste"> Steward </span>
                              </label>
                          </div>
                          <div class="radio">
                              <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
                                  <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Manage: Invoice"> Finance </span>
                              </label>
                          </div>
                          <div class="radio">
                              <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="3">
                                  <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="View: Inventory and Waste | Input: Invoice | Approve: Inventory Out"> Captain </span>
                              </label>
                          </div>
                          <div class="radio">
                              <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="4">
                                  <span class="tooltips" data-toggle="tooltip" data-placement="right" data-original-title="Approve: Requisition, PO and Invoice | View: Report"> Manager </span>
                              </label>
                          </div>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-info">Submit</button>

              </form>
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
@endpush