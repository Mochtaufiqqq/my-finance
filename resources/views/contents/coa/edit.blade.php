@extends('layouts.master')


@section('title','Edit COA')
    
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
                        <h5 class="card-title mb-4">Form Edit Chart Of Account</h5>
                        <form action="/chartofaccounts/update/{{ $coa->id_coa }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Kode</label>
                                <input type="number" class="form-control" name="code" value="{{ $coa->code }}" placeholder="" readonly>
                                @if ($errors->has('code'))
                                <div class="text-danger">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Nama</label>
                                <input type="text" class="form-control" name="coa_name" placeholder="Masukan Nama" value="{{ $coa->coa_name }}">
                                @if ($errors->has('coa_name'))
                                <div class="text-danger">{{ $errors->first('coa_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="">Kategori</label>
                                <select class="form-control" name="category_id" id="">
                                    <option disabled>Pilih Kategori</option>
                                    @foreach ($categories as $c)
                                        <option  value="{{ $c->id_category }}" {{ $coa->category_id == $c->id_category ? 'selected' : '' }}>
                                            {{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer mb-2">
                            <div class="mt-2">
                                
                                <a href="/chartofaccounts" class="btn btn-secondary">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection