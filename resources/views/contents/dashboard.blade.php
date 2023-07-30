@extends('layouts.master')

@section('title','Home')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-success custom-card">
                <div class="card-body">
                <h5 class="card-title">Penghasilan Hari Ini</h5>
                <h4>{{ $incomeToday }}</h4>
                <h6>Hari</h6>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success custom-card">
                <div class="card-body">
                <h5 class="card-title">Penghasilan Bulan Ini</h5>
                <h4>Rp 100000</h4>
                <h6>Bulan</h6>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success custom-card">
                <div class="card-body">
                <h5 class="card-title">Penghasilan Tahun Ini</h5>
                <h4>Rp 100000</h4>
                <h6>Tahun</h6>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger custom-card">
                <div class="card-body">
                <h5 class="card-title">Pengeluaran Hari Ini</h5>
                {{-- <h4>{{ $transactions->credit }}</h4> --}}
                <h6>Hari</h6>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger custom-card">
                <div class="card-body">
                <h5 class="card-title">Pengeluaran Bulan Ini</h5>
                <h4>Rp 100000</h4>
                <h6>Bulan</h6>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger custom-card">
                <div class="card-body">
                <h5 class="card-title">Pengeluaran Tahun Ini</h5>
                <h4>Rp 100000</h4>
                <h6>Tahun</h6>
            </div>
            </div>
        </div>
        
    </div>
</div>
@endsection