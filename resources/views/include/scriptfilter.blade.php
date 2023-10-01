<script src="{{ url('/user/libraries/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#filterInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function() {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                )
            });
        });
    });

</script>
