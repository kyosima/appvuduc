function viewShippingOrder(e){
    url = $(e).data('url');
    id_order = $(e).data('id');
    $.ajax({
        type: 'GET',
        url: url,
        data: {id_order: id_order},
        error: function (data) {
            console.log(data);
        },
        success: function (response) {
            $('body').after(response.html)
        }
    });
}

function destroyModal() {
    $('#order-shipping-view').remove();
}
