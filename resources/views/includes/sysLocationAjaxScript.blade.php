<script type="text/javascript" >
function get_division(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSysDivision')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#devision').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#devision')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}

function get_city(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSysCity')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#city').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#city')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}

function get_police_station(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSysPoliceStation')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#police_station').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#police_station')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}

function get_word(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSysWord')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#word').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#word')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}

function get_village(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSysVillage')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#village').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#village')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}

</script>
