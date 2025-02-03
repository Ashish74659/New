<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
<script>
      $(document).ready(function() {
        $('.search').click(function() {
            if ($('.select2-container :selected').text() === "") {
                $('.select2-container').addClass("error-container");
            } else {
                $('.select2-container').removeClass("error-container");
            }
        });
    });
</script>