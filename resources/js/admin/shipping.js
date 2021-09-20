
function viewShippingOrder(e){
    url = $(e).data('url');
    id_order = $(e).data('id');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        data: {id_order: id_order},
    })
    .done(function(data) {
        $('body').after(data)
    })
    .always(function() {
        RecieveAjax();
    });
}
function destroyModal() {
    $('#order-shipping-view').remove();
}

$(document).on('submit', '#form-order-shipping-create', function(event){
    $(".content-checkout").prepend('<div class="submit-overlay"><div class="spinner-border text-primary"></div></div>');
    event.preventDefault();
    $.ajax({
        url: $(this).data('action'),
        type: 'POST',
        dataType: 'html',
        data: $(this).serialize(),
    })
    .done(function(data) {
        console.log(data);
        $(".has-shipping-bill").remove();

        $("#btn-order-shipping-create").after('<button class="btn btn-success">'+
        '<i class="fas fa-shipping-fast"></i> Đã tạo đơn vận chuyển</button>');

        $("#btn-order-shipping-create").remove();
        
        destroyModal();
        
        $(".content-order").after(data);

        alert('Tạo đơn vận chuyển thành công');
    })
    .always(function() {
        RecieveAjax();
    });
});


