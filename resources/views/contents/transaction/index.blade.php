@extends('layouts.master')

@section('content')


<div class="page-body mt-4">
    {{-- <h5>hallo</h5> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5>Transaksi</h5>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Transaksi</h5>
                        <a href="/transactions/create" class="btn btn-outline-primary mb-2">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>COA Kode</th>
                                        <th>COA Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $t)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $t->transaction_date }}</td>
                                        <td>{{ $t->Coa->code }}</td>
                                        <td>{{ $t->Coa->coa_name }}</td>
                                        <td>{{ $t->desc }}</td>
                                        <td>{{ $t->debit }}</td>
                                        <td>{{ $t->credit }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-outline-primary">Lihat</a> --}}
                                            <a href="/transactions/edit/{{ $t->id_transaction }}" class="btn btn-outline-warning">Edit</a>
                                            <a href="/transactions/delete/{{ $t->id_transaction }}" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $t->id_transaction }}">Hapus</a>


                                            {{-- Delete Modal --}}
                                            <div class="modal fade" id="deleteModal{{ $t->id_transaction }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Hapus
                                                                Transaksi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 class="text-sm">Apakah anda yakin ingin menghapus transaksi ini ?</h6> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="/transactions/delete/{{ $t->id_transaction }}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Yakin</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

@if(session()->has('success'))
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Success',
                text: '{{ session()->get('success') }}',
                position: 'top-right',
                loaderBg:'#fff',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
        });
    </script>
@endif
    
@endsection


@endsection