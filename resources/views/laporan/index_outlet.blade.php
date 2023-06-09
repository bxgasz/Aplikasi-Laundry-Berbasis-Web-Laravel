@extends('layouts.master')

@section('title')
    Laporan Pendapatan Outlet {{$outlet->nama_outlet}} {{ tanggal_indonesia($tanggalAwal,false) }} s/d {{ tanggal_indonesia($tanggalAkhir,false) }}
@endsection
{{-- @push('css')
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush --}}
@section('breadcrumb')
    @parent
    <li class="active">Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah periode</button>
                <a href="{{ route('laporan.pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel-o"></i> Cetak PDF</a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Penjualan</th>
                        <th>Pendapatan</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('laporan.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir, $outlet->id_outlet]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'penjualan'},
                {data: 'pendapatan'},
            ],
            dom : 'Brt',
            bSort: false,
            bPaginate: false,
        });

        $('.datepicker').datepicker({
            format:'yyyy-mm-dd',
            autoclose: true
        });

    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }

</script>
@endpush