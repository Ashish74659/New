<script>
    $(document).ready(function() {             
        $('.delete').click(function(e) {
            var form = $(this).closest("form");
            e.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete it!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
                return false;
            })
        });

    });
</script>
