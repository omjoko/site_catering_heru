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
                Manajemen Resep
            </header>
            <div class="panel-body">
              <div class="container-fluid">
                  <span class="pull-right" style="margin-right: 10px;">
                            <a href="new-recipes"><button class="btn btn-success" data-toggle="modal">
                              <span class="fa fa-plus-circle"></span> Tambah Data
                            </button></a>
                  </span>
              </div>
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info" style="text-align: center;">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th style="text-align: center;">Nama Resep</th>
                        <th style="text-align: center;">Deskripsi</th>
                        <th style="text-align: center;">Tipe Resep</th>
                        <th style="text-align: center;"></th>
                        <th hidden=""></th>
                        <th hidden=""></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; $ke=0; use App\Http\Controllers\recipesController; $arraySep = array();?>
                    @foreach($recipes as $recipe)
                    <?php $no++; ?>
                    <?php 
                        $bahan_reseps = recipesController::sedotResep($recipe->id);
                        $arraySep[] = $bahan_reseps;
                    ?>
                      <tr class="gradeX">
                          <td>{{$no}}</td>
                          <td>{{$recipe->nama}}</td>
                          <td><?php echo $recipe->deskripsi; ?></td>
                          <td>
                              @if($recipe->tipe == 0)
                              <span class="label label-danger label-mini"> Makanan Pembuka</span>
                              @elseif($recipe->tipe==1)
                              <span class="label label-warning label-mini"> Makanan Utama</span>
                              @elseif($recipe->tipe==2)
                              <span class="label label-success label-mini"> Makanan Penutup</span>
                              @elseif($recipe->tipe==3)
                              <span class="label label-primary label-mini"> Minuman</span>
                              @endif
                          </td>
                          <td>
                             <button class="btn btn-primary btn-xs" data-toggle="modal" href="#modalUbah{{ $recipe->id }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#modalHapus{{ $recipe->id }}"><i class="fa fa-trash-o "></i></button>
                            <a href="new-ingredients-recipe?id={{$recipe->id}}"><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Bahan</button></a>
                          </td>
                          <td hidden="">
                            {{$ke}}
                          </td>
                          <td hidden="">
                            {{$recipe->gambar}}
                          </td>
                      </tr>
                      <?php $ke++; ?>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </section>
    </div>
</div>

@foreach($recipes as $recipe)
 <!-- Modal update -->
  <div class="modal fade" id="modalUbah{{ $recipe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Resep</h4>
              </div>
              <div class="modal-body">

                <form action="#" class="form-horizontal" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $recipe->id }}">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Resep</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" value="{{ $recipe->nama }}" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea id="deskripsi{{$recipe->id}}" class="form-control" name="deskripsi" rows="5">{{ $recipe->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipe Resep</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipe" >
                              @if($recipe->tipe==0)
                              <option value="0" selected="">Makanan Pembuka</option>
                              <option value="1">Makanan Utama</option>                          
                              <option value="2">Makanan Penutup</option>                          
                              <option value="3">Minuman</option>
                              @elseif($recipe->tipe==1)
                              <option value="0">Makanan Pembuka</option>
                              <option value="1" selected="">Makanan Utama</option>                          
                              <option value="2">Makanan Penutup</option>                          
                              <option value="3">Minuman</option>                              
                              @elseif($recipe->tipe==2)
                              <option value="0">Makanan Pembuka</option>
                              <option value="1">Makanan Utama</option>                          
                              <option value="2" selected="">Makanan Penutup</option>                          
                              <option value="3">Minuman</option>                              
                              @elseif($recipe->tipe==3)
                              <option value="0">Makanan Pembuka</option>
                              <option value="1">Makanan Utama</option>                          
                              <option value="2">Makanan Penutup</option>                          
                              <option value="3" selected="">Minuman</option>                              
                              @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Petunjuk</label>
                        <div class="col-sm-10">
                            <textarea id="petunjuk{{$recipe->id}}" class="form-control" name="petunjuk" rows="5">{{ $recipe->petunjuk }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm{{$recipe->id}}" data-input="thumbnail{{ $recipe->id }}" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Pilih
                                      </a>
                                    </span>
                                    <input id="thumbnail{{ $recipe->id }}" class="form-control" type="text" name="gambar" value="{{ $recipe->gambar }}">
                                  </div>
                                  <img id="holder{{ $recipe->id }}" style="margin-top:15px;max-height:100px;">
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
    <div class="modal fade" id="modalHapus{{ $recipe->id }}" tabindex="-1" role="dialog">
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
                <input type="hidden" name="id" value="{{ $recipe->id }}">

                <center>
                    <p>Apakah anda yakin ingin menghapus Resep : <b>{{ $recipe->nama }}</b>?</p>
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

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
@foreach($recipes as $recipe)
        CKEDITOR.replace( 'petunjuk{{$recipe->id}}' , {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        CKEDITOR.replace( 'deskripsi{{$recipe->id}}' , {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        $('#lfm{{$recipe->id}}').filemanager('image');
@endforeach
    </script>
<script type="text/javascript">
  /* Formating function for row details */
  function fnFormatDetails ( oTable, nTr )
  {
      var aData = oTable.fnGetData( nTr );
      var kes = aData[6];
      var foto = aData[7];
      var arraySep = <?php echo json_encode($arraySep);?>;
      // console.log(arraySep[kes]);
      var tableData = arraySep[kes];
      var sOut =            '<div class="col-md-4">';
          sOut +=                          '<table class="table table-striped">';
          sOut +=                            '<tr>';
          sOut +=                             '<th  style="text-align: center; background-color:#78CD51; color:white;">No.</th>';
          sOut +=                             '<th  style="text-align: center; background-color:#78CD51; color:white;">Bahan</th>';
          sOut +=                             '<th  style="text-align: center; background-color:#78CD51; color:white;">Jumlah</th>';
          sOut +=                             '<th  style="text-align: center; background-color:#78CD51; color:white;">Satuan</th>';
          sOut +=                           '</tr>';
          var no=0;
          for(i=0;i<tableData.length;i++){
            no++;
          sOut +=                               '<tr>';
          sOut +=                                 '<td>'+no+'</td>';
          sOut +=                                 '<td>'+tableData[i]["bahan"]["nama"]+'</td>';
          sOut +=                                  '<td>'+tableData[i]["jumlah"]+'</td>';
          sOut +=                                  '<td>'+tableData[i]["satuan"]+'</td>';
          sOut +=                               '<tr>';
          }
          sOut +=                          '</table>';
          sOut +=                        '</div>';
          sOut +=                        '<div class="pull-right">';
          sOut +=                          '<img src="'+foto+'" class="img img-responsive" width="640" height="320">';
          sOut +=                        '</div>';

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