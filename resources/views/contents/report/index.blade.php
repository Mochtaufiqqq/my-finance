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
            <div class="col-xl-4 mt-5">
                <div class="card border-dark sticky-top">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Cari berdasarkan tanggal</h5>
                        <form action="/reports/getreports" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="from" placeholder="Dari tanggal"
                                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="to" placeholder="Sampai tanggal"
                                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                            </div>
                            <div class="d-flex justify-content-end">
                                <!-- Use d-flex and justify-content-end -->
                                <button class="btn btn-primary" style="width: 30%" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Laporan</h5>


                        @if ($transactions ?? '')
                        {{-- <button class="btn btn-success dt-excel">Export Excel</button> --}}

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="dtReport">
                                <thead class="table-primary">
                                    <tr>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Tanggal</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Kategori
                                        </th>
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
                                <tfoot class="table-secondary">
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th>{{ number_format($totalDebit, 2) }}</th>
                                        <th>{{ number_format($totalCredit, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            <div class="text-center">Tidak ada data</div>
                            @endif
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