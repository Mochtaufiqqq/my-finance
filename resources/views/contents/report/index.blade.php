@extends('layouts.master')

@section('title','Reports')

@section('content')
    
<div class="page-body mt-4">
    {{-- <h5>hallo</h5> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5>Laporan</h5>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Laporan</h5>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tanggal</th>
                                        <th rowspan="2">Kategori</th>
                                        <th colspan="2" class="text-center">Jenis</th>
                                    </tr>
                                    <tr>
                                        <th>Pemasukan</th>
                                        <th>Pengeluaran</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                    @endphp
                                    @foreach ($transactions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->transaction_date)) }}</td>
                                        <td>{{ $item->Coa->Category->name }}</td>
                                        <td>{{ $item->debit }}</td>
                                        <td>{{ $item->credit }}</td>
                                    </tr>
                                    @php
                                    $totalDebit += $item->debit;
                                    $totalCredit += $item->credit;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th>{{ $totalDebit }}</th>
                                        <th>{{ $totalCredit }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@section('js')

@if(session()->has('success'))
<script>
    $(document).ready(function () {
        $.toast({
            heading: 'Success',
            text: '{{ session()->get('
            success ') }}',
            position: 'top-right',
            loaderBg: '#fff',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    });
</script>
@endif
@endsection

