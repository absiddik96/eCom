<script type="text/javascript" >
function get_category(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getCategory')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#category').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#category')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}
</script>
