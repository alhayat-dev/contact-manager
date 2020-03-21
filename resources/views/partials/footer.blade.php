
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/jquery-ui/jquery-ui.js') }}"></script>




<script>
    $(document).ready(function() {
        $( "#term" ).autocomplete({

            source: function(request, response) {
                $.ajax({
                    url: "{{url('contacts.autocomplete')}}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            console.log(obj.city_name);
                            // return obj.name;
                        });

                        response(resp);
                    }
                });
            },
            minLength: 3
        });
    });

</script>





@yield('form-script')

</body>
</html>
