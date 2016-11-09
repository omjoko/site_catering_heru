@extends('layouts.laporan')

@section('judul')
Inventory Out
@stop

@section('isi')

<table align="center">
    <thead>
    <tr>
        <th style="width: 10%;">No.</th>
        <th>Nama Bahan</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Tanggal</th>
        <th>No.Rekuisisi</th>
        <th>Nama Gudang</th>

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
        <td>@foreach($storages as $storage)
                            @if($inventory->gudang==$storage->id_storages)
                              {{$storage->nama}}
                            @endif
                          @endforeach</td>

    </tr>
    @endforeach
    </tbody>
</table>

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