
$(document).delegate('.map_mandatory', 'change', function () {
    if($(this).is(":checked")){
        if($('.allow_map').is(":not(:checked)")){
            $('.allow_map').trigger('click');
        }
    }
});
$(document).delegate('.allow_map', 'change', function () {
    if($(this).is(":not(:checked)")){
        if($('.map_mandatory').is(":checked")){
            $('.allow_map').trigger('click');
        }
    }
});
$(document).delegate('.photos_mandatory', 'change', function () {
    if($(this).is(":checked")){
        if($('.allow_photos').is(":not(:checked)")){
            $('.allow_photos').trigger('click');
        }
    }
});
$(document).delegate('.allow_photos', 'change', function () {
    if($(this).is(":not(:checked)")){
        if($('.photos_mandatory').is(":checked")){
            $('.allow_photos').trigger('click');
        }
    }
});
/*-------------------------------start :: function-----------------------------------------------*/
    //ajax
    $Ajax = function (method, oVals) {
        oVals = JSON.stringify(oVals);
        $.ajax({
            type: "POST",
            url: base_url+'/ajax',
            data: {method: method, oVals: oVals, _token: _token},
            cache: false,
            success: function (html) {
                $('body').append(html);
            }
        });
    }

/*-------------------------------end :: function------------------------------------------------*/

/*-------------------------------start :: change category and sub category------------------------------------------------*/

    $(document).delegate('.category', 'change', function (e) {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: base_url+'/change_category',
            data: { id: id, _token: _token},
            cache: false,
            success: function (html) {
                $('.categoryClass').append(html);
            }
        });
    });
/*-------------------------------end :: change category and sub category------------------------------------------------*/

/*------------------------------start :: upload photo --------------------------------------*/
    function showUploadedItem(source) {
        $('#product-image img').attr('src', source);
    }

    $(document).on("click", ".imgfile", function (e) {
        $('#img').trigger('click');
    });

    $('#img').change(function () {
        file = this.files[0];
        if (!!file.type.match(/image.*/)) {
            if (window.FileReader) {
                reader = new FileReader();
                reader.onloadend = function (e) {
                    showUploadedItem(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    function showUploadedItem2(source) {
        $('#product-image2 img').attr('src', source);
    }

    $(document).on("click", ".imgfile2", function (e) {
        $('#img2').trigger('click');
    });

    $('#img2').change(function () {
        file = this.files[0];
        if (!!file.type.match(/image.*/)) {
            if (window.FileReader) {
                reader = new FileReader();
                reader.onloadend = function (e) {
                    showUploadedItem2(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
/*--------------------------------end :: upload photo --------------------------------------*/

$(document).on('click','.select_popup',  function (e) {
	e.preventDefault();
    var id=$(this).data('id');
    var check = $('.box'+id).data('id');
    if(check == '*'){
    	$('.box'+id).css({"border-color": "#f00", 
                 "border-width":"3px", 
                 "border-style":"solid"});
    }else{
    	$('.box'+id).css('border','none');

    }
    // $('.mfp-ready').css('display','none');
});

    /*------------------------------start :: delete table ----------------------------------------*/
    $(document).on("click", ".trash", function (e) {
        var id = $(this).parents('tr').attr('row');
        var table = $(this).parents('tr').data('table');
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $('body').append('<div class="loading"><img src="'+base_url+'/assets/admin/loading.gif" /></div>');
                var oVals = {};
                oVals['id'] = id;
                oVals['table'] = table;
                $Ajax('deleteRow', oVals);
                $(document).on("click", ".remove_row_" + id, function (e) {
                    var id = $(this).attr('row');
                    datatables.row('tr[row=' + id + ']').remove().draw(false);
                });
            }
        });
    });
    $(document).on("click", ".trashProduct", function (e) {
        var div = $(this).parents('.col-lg-3');
        var id = $(this).parents('.col-lg-3').attr('row');
        var table = $(this).parents('.col-lg-3').data('table');
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $('body').append('<div class="loading"><img src="'+base_url+'/assets/admin/loading.gif" /></div>');
                var oVals = {};
                oVals['id'] = id;
                oVals['table'] = table;
                $Ajax('deleteRow', oVals);
                div.remove();
            }
        });
    });
    /*--------------------------------end :: delete table ----------------------------------------*/
    if($('#myTable').length >0)
    {
    	var datatables = $('#myTable').DataTable({
	        "columnDefs": [
	            {"orderable": false, "targets": 0}
	        ]
	    });
    }
    /*--------------------------------start :: add and remove field ----------------------------------------*/

    $(document).delegate('#add_new_field', 'click', function (e) {
        e.preventDefault();
        $('.add_here').append(`
            <div class="blockSize">
                <label for="name" class="col-lg-1">Size:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="size[]" id="name">
                </div>
                <label for="name" class="col-lg-1">Price:</label>
                <div class="col-lg-4"><input type="text" class="form-control" name="price[]" id="name">
                </div>
                <label for="name" class="col-lg-2">
                    <a href="#" id="remove_field"><i class="fa fa-remove fa-3x" style="color:red;" aria-hidden="true"></i></a>
                </label>
            </div>
            `);
    });

    $(document).delegate('#remove_field', 'click', function (e) {
        e.preventDefault();
        $(this).closest(".blockSize").remove();
    });
    /*--------------------------------end :: add and remove field ----------------------------------------*/

    $(document).delegate('.add_to_cart', 'click', function (e) {
        e.preventDefault();
        alert(444);
        var id = $(this).parents(".wow").attr('data-id');
        var oVals = {};
        oVals['p_id'] = id;
        $Ajax('add_to_cart', oVals);
    });