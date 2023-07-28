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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy to Clipboard', // Custom button text
                    className: 'btn btn-primary' // Apply custom CSS class
                },
                {
                    extend: 'csv',
                    text: 'Export to CSV',
                    className: 'btn btn-success'
                },
                {
                    extend: 'excel',
                    text: 'Export Excel',
                    className: 'btn btn-warning'
                },
                {
                    extend: 'pdf',
                    text: 'Export to PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-info'
                }
            ]
        });
    });
</script>


<script>
    $(document).ready(function () {
        // When the "Pilih" button is clicked, autofill the "Kode" and "Nama" fields
        $(".pilih-btn").on("click", function () {
            var code = $(this).closest("tr").find("td:first-child").text();
            var name = $(this).closest("tr").find("td:nth-child(2)").text();

            // Set the values in the input fields
            $("#codeCoa").val(code);
            $("#name").val(name);

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
  
  
