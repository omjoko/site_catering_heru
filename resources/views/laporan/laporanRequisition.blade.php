@extends('layouts.laporan')

@section('judul')
PO / Rekuisisi
@stop

@section('isi')

<?php $no = 0; use App\Http\Controllers\requisitionsController;?>
@foreach($requisitions as $requisition)
<?php $no++; ?>
<?php 
    $DR = requisitionsController::sedot_detail($requisition->id);
?>                                            
<div style="margin-bottom:30px;">
    <b>No : {{ $no+1 }}</b><br>
    <b>No Rekuisisi : R{{ $requisition->id }}</b><br>
    <b>Deskripsi : {{ $requisition->deskripsi }}</b><br>
    <b>Vendor : {{ $requisition->vendors['nama_vendor'] }}</b>
</div>

<table align="center">
    <tr>
        <th style="width: 5%;">No.</th>
        <th>Nama bahan</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Total</th>
    </tr>
    <?php $nos = 0; ?>
    @foreach($DR as $detail_requisition)
    <?php $nos++; ?>
        <tr>
          <td>{{ $nos }}</td>
          <td>{{ $detail_requisition->ingredients[0]['nama'] }}</td>
          <td>{{ $detail_requisition->jumlah }}</td>
          <td>
              {{ $detail_requisition->ingredients[0]->pembelian['satuan'] }}
          </td>
          <td>{{ $detail_requisition->harga }}</td>
          <?php $total = $detail_requisition->jumlah*$detail_requisition->harga; ?>
          <td>{{$total}}</td>
        </tr>
      <?php $totals[] = $total;  ?>
    @endforeach
</table>
<b>Total : {{ array_sum($totals) }}</b>
@endforeach

@stop

@section('ttd')
<!-- <table class="tabelkosong" style="margin-top:5px;">
    <tr>
        <td style="width:700px;">
            
        </td>
        <td>
            <p>
                Pontianak, ...........................
                <center></center>
            </p>
            <br>
            <br>
            <br>
            <p>
                <center></center>
            </p>
        </td>
    </tr>
</table> -->
@stop