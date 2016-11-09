@extends('layouts.pdf')

@section('judul')
PO / Rekuisisi
@stop

@section('tanggal')
{{ $tgl_awal }} sampai {{ $tgl_akhir }}
@stop

@section('isi')
<table align="center">
  <thead>
      <tr>
          <th>No</th>
          <th>No Rekuisisi</th>
          <th>Deskripsi</th>
          <th>Vendor</th>
          <th>Total</th>
          <th>Status</th>
      </tr>
  </thead>
  <tbody>
    @foreach($donaturs as $no => $donatur)
      <tr>
          <td>{{ $no+1 }}</td>
          <td>{{ $requisition->id }}</td>
          <td>{{ $requisition->deskripsi }}</td>
          <td>{{ $requisition->vendors['nama_vendor'] }}</td>
          <td>{{ $requisition->total }}</td>
          <td>{{ $requisition->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('ttd')
<table class="tabelkosong" style="margin-top:5px;">
    <tr>
        <td style="width:700px;">
            
        </td>
        <td>
            <p>
                Pontianak, ...........................
                <center>{{ $jabatan }}</center>
            </p>
            <br>
            <br>
            <br>
            <p>
                <center>{{ $namaTTD }}</center>
            </p>
        </td>
    </tr>
</table>
@stop