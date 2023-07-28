@extends('layouts.master')

@section('content')


<div class="page-body mt-4">
    {{-- <h5>hallo</h5> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5>Kategori</h5>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card border-dark mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Kategori</h5>
                        <a href="" class="btn btn-outline-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#createModal">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-row" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-outline-primary">Lihat</a> --}}
                                            <a href="/categories/update/{{ $c->id_category }}" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $c->id_category }}">Edit</a>
                                            <a href="/categories/delete/{{ $c->id_category }}" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id_category }}">Hapus</a>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="EditModal{{ $c->id_category }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit
                                                                Kategori</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/categories/update/{{ $c->id_category }}" method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="form-label" for="">Nama
                                                                        Kategori</label>
                                                                    <input class="form-control" type="text" name="name"
                                                                        placeholder="Masukan Nama Kategori" value="{{ $c->name }}" required>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Delete Modal --}}
                                            <div class="modal fade" id="deleteModal{{ $c->id_category }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Hapus
                                                                Kategori</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 class="text-sm">Apakah anda yakin ingin menghapus kategori {{ $c->name }} ?</h6>
                                                               
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="/categories/delete/{{ $c->id_category }}" method="POST">
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

<!-- Create Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/categories/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="">Nama Kategori</label>
                        <input class="form-control" type="text" name="name" placeholder="Masukan Nama Kategori"
                            required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection