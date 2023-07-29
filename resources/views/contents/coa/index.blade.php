@extends('layouts.master')

@section('content')


<div class="page-body mt-4">
    {{-- <h5>hallo</h5> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5>Chart Of Account</h5>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Chart Of Account</h5>
                        <a href="/chartofaccounts/create" class="btn btn-outline-primary mb-2"><i
                            class="fas fa-plus"></i> Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coa as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->code }}</td>
                                        <td>{{ $c->coa_name }}</td>
                                        <td>{{ $c->Category->name }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-outline-primary">Lihat</a> --}}
                                            <a href="/chartofaccounts/detail/{{ $c->id_coa }}" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $c->id_coa }}">Lihat</a>
                                            <a href="/chartofaccounts/edit/{{ $c->id_coa }}" class="btn btn-outline-warning">Edit</a>
                                            <a href="/chartofaccounts/delete/{{ $c->id_coa }}" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id_coa }}">Hapus</a>
                                            


                                            {{-- Delete Modal --}}
                                            <div class="modal fade" id="deleteModal{{ $c->id_coa }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Hapus
                                                                COA</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 class="text-sm">Apakah anda yakin ingin menghapus {{ $c->coa_name }} ?</h6> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="/chartofaccounts/delete/{{ $c->id_coa }}" method="POST">
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

                                             {{-- Detail Modal --}}
                                             <div class="modal fade" id="detailModal{{ $c->id_coa }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail COA</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="row">
                                                            <div class="col">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Kode</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Kategori</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>{{ $c->code }}</td>
                                                                                    <td>{{ $c->coa_name }}</td>
                                                                                    <td>{{ $c->Category->name }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
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

@if(session()->has('error'))
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Error',
                text: '{{ session()->get('error') }}',
                position: 'top-right',
                loaderBg:'#fff',
                icon: 'error',
                hideAfter: false,
            });
        });
    </script>
@endif
    
@endsection

@endsection