<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#coursesTable').DataTable({
            dom: '<"row mb-3"<"col-md-6"l><"col-md-6 text-end"f>>tip',
        });
    });
</script>
