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
                <div class="table-responsive">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama COA</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Customer data goes here -->
                        @foreach ($coa as $c)
                        <tr>
                            <td>{{ $c->code }}</td>
                            <td>{{ $c->coa_name }}</td>
                            <td>{{ $c->Category->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" id="pilih-btn" 
                                    data-id="{{ $c->id_coa }}" 
                                    data-code="{{ $c->code }}" 
                                    data-coa_name="{{ $c->coa_name }}"
                                    type="button">Pilih
                                </button>
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