$(document).on("change","#namaSistem",function(){
    var html = ""
    $.ajax({
        url: "fetch/ajaxModul?sistemid=" + $(this).val(),
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