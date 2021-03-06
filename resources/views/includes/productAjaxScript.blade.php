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


function get_sub_category(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSubCategory')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#sub_category').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#sub_category')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}
</script>
<script>
    var pre_color = $('#pre_color').val();
    $("#custom").spectrum({
        showPaletteOnly: true,
        showInitial: true,
        showInput: true,
        preferredFormat: "hex",
        togglePaletteOnly: true,
        togglePaletteMoreText: 'more',
        togglePaletteLessText: 'less',
        color: pre_color,
        palette: [
            ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
            ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
            ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
            ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
            ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
            ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
            ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
            ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
        ]
    });

    $("#custom").show();
</script>
