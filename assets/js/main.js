$(document).on("change","#namaSistem",function(){
    var html = ""
    $.ajax({
        url: "../fetch/ajaxModul?sistemid=" + $(this).val(),
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            $.each(res, function(val){
                html += '<option value="'+res[val].id+'">'+res[val].kod+' - '+res[val].namamodul+'</option>'
            })
            $("#subModul").html(html)
        }
    });
})

$(document).on("click",".img-lampiran",function(){
    console.log($(this).find('img').attr('src'))
    $('.imgpreview').attr('src', $(this).find('img').attr('src'));
    $('#modal-lampiran').modal('show'); 
})

$(document).on('change','.chk_menulvl1-groupaccess',function(){
    if ($(this).is(':checked')) {
        $.ajax({
            url: "../utilities/update_groupaccess",
            type: 'POST',
            dataType: 'json',
            data: {
                accesslevel_id : $("#hidaccesslvlID").val(),
                menu_id : $(this).val()
            }, // added data type
            success: function(res) {
                console.log(res)
            }
        });
    }else{
        $.ajax({
            url: "../utilities/delete_groupaccess",
            type: 'POST',
            dataType: 'json',
            data: {
                accesslevel_id : $("#hidaccesslvlID").val(),
                menu_id : $(this).val()
            }, // added data type
            success: function(res) {
                console.log(res)
            }
        });
    }
})


$(document).on('click','.del-menu', function(e){
    var value = $(this).val()
    confirmDialog('YOUR_MESSAGE_STRING_CONST', value, function(){
        window.location.href = value;
    });
});

function confirmDialog(message, val, onConfirm){
    var fClose = function(){
        modal.modal("hide");
    };
    var modal = $("#confirm-modal-danger");
    modal.modal("show");
    $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
    $("#confirmCancel").unbind().one("click", fClose);
}


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ( (charCode > 31 && charCode < 48) || charCode > 57) {
        return false;
    }
    return true;
}

