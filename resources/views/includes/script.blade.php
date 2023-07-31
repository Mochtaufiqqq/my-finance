<!-- Load jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.js"></script>
<script src="https://kit.fontawesome.com/4c48033608.js" crossorigin="anonymous"></script>
<script src="/js/datatable/report.js"></script>


{{-- datatable --}}
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            language: {
                lengthMenu: '_MENU_',
                zeroRecords: "Tidak ada catatan yang cocok untuk ditemukan",
                infoEmpty: "Tidak ada data",
                emptyTable: "Tidak ada catatan yang cocok untuk ditemukan",
                search: 'Cari '
            },
           
        });
    });
</script>


<script>
    $(document).ready(function () {
        // When the "Pilih" button is clicked, autofill the "Kode" and "Nama" fields
        $(document).on('click', '#pilih-btn', function () {
            var id_coa = $(this).data('id');
            var code = $(this).data('code');
            var coa_name = $(this).data('coa_name');

            // Set the values in the input fields
            $("#coa_id").val(id_coa);
            $("#codeCoa").val(code);
            $("#coa_name").val(coa_name);

            // Close the modal after selecting
            $("#modalCoa").modal("hide");
        });
    });
</script>

<script>
    function showDebitForm() {
        // Tampilkan form nominal debit
        document.getElementById("debitForm").style.display = "block";
        // Sembunyikan form nominal kredit
        document.getElementById("creditForm").style.display = "none";
    }

    function showCreditForm() {
        // Tampilkan form nominal kredit
        document.getElementById("creditForm").style.display = "block";
        // Sembunyikan form nominal debit
        document.getElementById("debitForm").style.display = "none";
    }
</script>