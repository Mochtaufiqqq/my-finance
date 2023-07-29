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
                        <h5 class="card-title mb-4">Form Edit Transaksi</h5>
                        <form action="/transactions/update/{{ $transactions->id_transaction }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="form-group mb-2">
                                <label class="form-label" for="">Tanggal</label>
                                <input name="transaction_date" type="text" class="form-control"
                                    placeholder="Masukan tanggal transaksi" onfocusin="(this.type='date')"
                                    onfocusout="(this.type='text')" value="{{ $transactions->transaction_date }}">
                                @if ($errors->has('transaction_date'))
                                <div class="text-danger">{{ $errors->first('transaction_date') }}</div>
                                @endif
                            </div>
                            <input type="hidden" name="coa_id" id="coa_id" value="{{ $transactions->coa_id }}" >
                            <label class="form-label" for="">Kode COA</label>
                            <div class="input-group form-group mb-2">
                                <input type="text" class="form-control" id="codeCoa"
                                    placeholder="Pilih chart of account" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" name="" value="{{ $transactions->Coa->code }}" readonly>
                                <button type="button" class="btn btn-info btn-flat" data-bs-toggle="modal"
                                    data-bs-target="#modalCoa">Pilih
                                </button>
                                
                            </div>
                            @if ($errors->has('coa_id'))
                                <div class="text-danger">{{ $errors->first('coa_id') }}</div>
                                @endif
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Nama COA</label>
                                <input type="text" class="form-control" placeholder="Nama"
                                    value="{{ $transactions->Coa->coa_name }}" id="coa_name" readonly>
                                @if ($errors->has('coa_id'))
                                <div class="text-danger">{{ $errors->first('coa_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Deskripsi</label>
                                <textarea class="form-control" name="desc" id="" rows="2"
                                    placeholder="Deskripsi">{{ $transactions->desc }}</textarea>
                                @if ($errors->has('desc'))
                                <div class="text-danger">{{ $errors->first('desc') }}</div>
                                @endif
                            </div>
                         
                            <label for="" class="form-label">Jenis Pembayaran</label>
                            @if ($transactions->debit)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Debit
                                </label>
                              </div>

                               <!-- Form input nominal debit (sembunyikan awalnya) -->
                               <div class="form-group">
                                <input type="number" class="form-control" name="debit" placeholder="Masukan Nominal" value="{{ $transactions->debit }}">
                              </div>
                              @elseif ($transactions->credit)
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Kredit
                                </label>
                              </div>
                              @if ($errors->has('debit'))
                              <div class="text-danger">{{ $errors->first('debit') }}</div>
                              @elseif ($errors->has('credit'))
                              <div class="text-danger">{{ $errors->first('debit') }}</div>
                              @endif
                               <!-- Form input nominal kredit -->
                               <div class="form-group">
                                <input type="number" class="form-control" name="credit" placeholder="Masukan Nominal" value="{{ $transactions->credit }}">
                              </div>
                            @endif

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


@include('contents.transaction.modal-coa')

@endsection