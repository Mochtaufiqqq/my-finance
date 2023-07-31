@extends('layouts.master')

@section('title','Transactions')
    
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
                        <h5 class="card-title mb-4">Data Transaksi Yang Telah Dihapus</h5>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="example">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Kode COA</th>
                                        <th>Nama COA</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $t)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($t->transaction_date)) }}</td>
                                        <td>{{ $t->Coa->code }}</td>
                                        <td>{{ $t->Coa->coa_name }}</td>
                                        <td>{{ $t->desc }}</td>
                                        <td>{{ $t->debit }}</td>
                                        <td>{{ $t->credit }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-outline-primary">Lihat</a> --}}
                                            <div class="button-container">
                                                <a href="/transactions/detail/{{ $t->id_transaction }}" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $t->id_transaction }}"><i class="fas fa-eye"></i></a>
                                                <a href="/transactions/trash/restore/{{ $t->id_transaction }}" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $t->id_transaction }}"><i class="fas fa-arrow-up"></i></a>
                                                <a href="/transactions/trash/delete/{{ $t->id_transaction }}" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $t->id_transaction }}"><i class="fas fa-trash"></i></a>
                                            </div>


                                            {{-- Force Delete Modal --}}
                                            <div class="modal fade" id="forceDeleteModal{{ $t->id_transaction }}"
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
                                                            <h6 class="text-sm mb-3">Apakah anda yakin ingin menghapus transaksi ini,data ini akan dihapus secara permanen ?</h6> 
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tanggal</th>
                                                                            <th>Kode COA</th>
                                                                            <th>Nama COA</th>
                                                                            <th>Keterangan</th>
                                                                            <th>Debit</th>
                                                                            <th>Kredit</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ date('d-m-Y', strtotime($t->transaction_date)) }}</td>
                                                                            <td>{{ $t->Coa->code }}</td>
                                                                            <td>{{ $t->Coa->coa_name }}</td>
                                                                            <td>{{ $t->desc }}</td>
                                                                            <td>{{ $t->debit }}</td>
                                                                            <td>{{ $t->credit }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="/transactions/trash/delete/{{ $t->id_transaction }}" method="POST">
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

                                            {{-- restore modal --}}
                                            <div class="modal fade" id="restoreModal{{ $t->id_transaction }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Kembalikan
                                                                Transaksi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 class="text-sm mb-3">Apakah anda yakin ingin mengembalikan transaksi ini ?</h6> 
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tanggal</th>
                                                                            <th>Kode COA</th>
                                                                            <th>Nama COA</th>
                                                                            <th>Keterangan</th>
                                                                            <th>Debit</th>
                                                                            <th>Kredit</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ date('d-m-Y', strtotime($t->transaction_date)) }}</td>
                                                                            <td>{{ $t->Coa->code }}</td>
                                                                            <td>{{ $t->Coa->coa_name }}</td>
                                                                            <td>{{ $t->desc }}</td>
                                                                            <td>{{ $t->debit }}</td>
                                                                            <td>{{ $t->credit }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="/transactions/trash/restore/{{ $t->id_transaction }}" method="POST">
                                                                @method('put')
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

                                            {{-- Detail Modal --}}
                                            <div class="modal fade" id="detailModal{{ $t->id_transaction }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tanggal</th>
                                                                            <th>Kategori</th>
                                                                            <th>Kode COA</th>
                                                                            <th>Nama COA</th>
                                                                            <th>Keterangan</th>
                                                                            <th>Debit</th>
                                                                            <th>Kredit</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ $t->transaction_date }}</td>
                                                                            <td>{{ $t->Coa->Category->name }}</td>
                                                                            <td>{{ $t->Coa->code }}</td>
                                                                            <td>{{ $t->Coa->coa_name }}</td>
                                                                            <td>{{ $t->desc }}</td>
                                                                            <td>{{ $t->debit }}</td>
                                                                            <td>{{ $t->credit }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Kembali</button>
                                                       
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