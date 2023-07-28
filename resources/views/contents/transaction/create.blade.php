@extends('layouts.master')

@section('content')


<div class="page-body mt-4">
    {{-- <h5>hallo</h5> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5></h5>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Form Tambah Transaksi</h5>
                        <form action="/transactions/store" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Tanggal</label>
                                <input name="transaction_date" type="text" class="form-control"
                                    placeholder="Masukan tanggal transaksi" onfocusin="(this.type='date')"
                                    onfocusout="(this.type='text')" value="{{ old('transaction_date') }}">
                                @if ($errors->has('transaction_date'))
                                <div class="text-danger">{{ $errors->first('transaction_date') }}</div>
                                @endif
                            </div>
                            <label class="form-label" for="">Kode</label>
                            <div class="input-group form-group mb-2">
                                <input type="text" class="form-control" id="codeCoa"
                                    placeholder="Pilih chart of account" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" name="coa_id" value="" readonly>
                                <button type="button" class="btn btn-info btn-flat" data-bs-toggle="modal"
                                    data-bs-target="#modalCoa">Pilih
                                </button>
                                @if ($errors->has('code'))
                                <div class="text-danger">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama"
                                    value="" id="name" readonly>
                                {{-- @if ($errors->has('coa_name'))
                                <div class="text-danger">{{ $errors->first('coa_name') }}</div>
                                @endif --}}
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Deskripsi</label>
                                <textarea class="form-control" name="desc" id="" rows="2"
                                    placeholder="Deskripsi">{{ old('desc') }}</textarea>
                                @if ($errors->has('desc'))
                                <div class="text-danger">{{ $errors->first('desc') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Jenis Transaksi</label>
                                <select class="form-control" name="transaction_type" id="">
                                    <option value="" selected disabled>Pilih jenis transaksi</option>
                                    <option value="income">Pendapatan</option>
                                    <option value="expense">Pengeluaran</option>

                                </select>
                                @if ($errors->has('transaction_type'))
                                <div class="text-danger">{{ $errors->first('transaction_type') }}</div>
                                @endif
                            </div>
                            <label for="" class="form-label">Jenis Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="showDebitForm()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Debit
                                </label>
                              </div>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="showCreditForm()" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Credit
                                </label>
                              </div>
                              
                              <!-- Form input nominal debit (sembunyikan awalnya) -->
                              <div class="form-group" id="debitForm" style="display: none;">
                                <input type="number" class="form-control" name="debit" placeholder="Masukan Nominal">
                              </div>
                              
                              <!-- Form input nominal kredit -->
                              <div class="form-group" id="creditForm" style="display: none;">
                                <input type="number" class="form-control" name="credit" placeholder="Masukan Nominal">
                              </div>

                    </div>
                    <div class="card-footer mb-2">
                        <div class="mt-2">

                            <a href="/transactions" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Choose COA-->
<div class="modal fade" id="modalCoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih COA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="customerTable">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Customer data goes here -->
                        @foreach ($coa as $c)
                        <tr>
                            <td>{{ $c->code }}</td>
                            <td>{{ $c->coa_name }}</td>
                            <td>
                                <button class="btn btn-primary pilih-btn" data-id="{{ $c->id_coa }}"
                                    type="button">Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection