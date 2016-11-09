@extends('layouts.laporan')

@section('judul')
Jumlah Sampah
@stop

@section('isi')
                                      
<div style="margin-bottom:30px;">
    <b>Sampah Masak</b>
</div>

<table align="center">
    <tr>
        <th style="width: 5%;">No.</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Keberangkatan</th>
        <th>Nama Kapal</th>
        <th>Total Sampah</th>
    </tr>
    @foreach($wastes as $no => $waste)
    @foreach($voyages as $voyage)
      @if($waste->id_voyages==$voyage->id&&$waste->jenis_sampah==1)
        <tr>
          <td>{{ $no+1 }}</td>
          <td>
            @foreach($pelabuhans as $pelabuhan)
              @if($pelabuhan->id_pelabuhan==$voyage->asal)
               {{ $pelabuhan->nama_pelabuhan }}
              @endif
            @endforeach
          </td>
          <td>
            @foreach($pelabuhans as $pelabuhan)
              @if($pelabuhan->id_pelabuhan==$voyage->tujuan)
               {{ $pelabuhan->nama_pelabuhan }}
              @endif
            @endforeach 
          </td>
          <td>
              {{ $voyage->keberangkatan }}
          </td>
          <td>{{ $voyage->nama_kapal }}</td>
          <td>
            @if($voyage->id==$waste->id_voyages)
                {{ $waste->berat }} kg
                <?php $total0= $waste->berat; ?>
            @endif
          </td>
        </tr>
      <?php $totals0[] = $total0;  ?>
      @endif
    @endforeach
    @endforeach
</table>
<b>Total Sampah Masak: {{ array_sum($totals0) }} kg</b>

<div style="margin-bottom:30px;margin-top:30px;">
    <b>Sampah Makan</b>
</div>

<table align="center">
    <tr>
        <th style="width: 5%;">No.</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Keberangkatan</th>
        <th>Nama Kapal</th>
        <th>Total Sampah</th>
    </tr>
    @foreach($wastes as $no => $waste)
    @foreach($voyages as $voyage)
      @if($waste->id_voyages==$voyage->id&&$waste->jenis_sampah==2)
        <tr>
          <td>{{ $no+1 }}</td>
          <td>
            @foreach($pelabuhans as $pelabuhan)
              @if($pelabuhan->id_pelabuhan==$voyage->asal)
               {{ $pelabuhan->nama_pelabuhan }}
              @endif
            @endforeach
          </td>
          <td>
            @foreach($pelabuhans as $pelabuhan)
              @if($pelabuhan->id_pelabuhan==$voyage->tujuan)
               {{ $pelabuhan->nama_pelabuhan }}
              @endif
            @endforeach 
          </td>
          <td>
              {{ $voyage->keberangkatan }}
          </td>
          <td>{{ $voyage->nama_kapal }}</td>
          <td>
            @if($voyage->id==$waste->id_voyages)
                {{ $waste->berat }} kg
                <?php $total1= $waste->berat; ?>
            @endif
          </td>
        </tr>
      <?php $totals1[] = $total1;  ?>
      @endif
    @endforeach
    @endforeach
</table>
<b>Total Sampah Makan: {{ array_sum($totals1) }} kg</b>
<br>
<b>Total Seluruh Sampah: {{ (array_sum($totals0))+(array_sum($totals1)) }} kg</b>
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