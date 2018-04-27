$(document).ready(function() {

    $('select[name="type"]').on('change', function(){
        var type_id = $(this).val();
        if(type_id) {
            $.ajax({
                url: '/types/get/'+type_id,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="category_id"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="category_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="category_id"]').empty();
        }

    });

});