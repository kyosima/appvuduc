function viewDetailOrder(e){
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

function orderDestroy(order_id){
    if(!confirm('Bạn có chắc muốn hủy đơn hàng không ?')){
        return;
    }
    $.ajax({
        url: urlHome+'/admin/don-hang/huy-don-hang',
        type: 'PATCH',
        data: {_token: token, order_id: order_id},
    })
    .done(function(data) {
        
        $(".has-shipping-bill").remove();
        $(".change-status-"+data+" .status-order").replaceWith('<span class="text-danger status-order">Đã hủy</span>');

        $("#btn-order-shipping-create").remove();
        $(".card-footer").remove();
        $.toast({
            heading: 'Thành công',
            text: 'Đã hủy đơn hàng thành công',
            position: 'top-right',
            icon: 'success'
        });
    })
    .fail(function() {
        $.toast({
            heading: 'Thất bại',
            text: 'Hủy đơn hàng không thành công',
            position: 'top-right',
            icon: 'error'
        });
    });
}

function orderDelete(e,order_id){
    if(!confirm('Bạn có chắc muốn hủy đơn hàng không ?')){
        return;
    }
    $.ajax({
        url: urlHome+'/admin/don-hang/xoa-don-hang',
        type: 'DELETE',
        data: {_token: token, order_id: order_id},
    })
    .done(function(data) {
        $(e).parents('tr').remove();
        $.toast({
            heading: 'Thành công',
            text: 'Xóa đơn hàng thành công',
            position: 'top-right',
            icon: 'success'
        });
    })
    .fail(function() {
        $.toast({
            heading: 'Thất bại',
            text: 'Xóa đơn hàng không thành công',
            position: 'top-right',
            icon: 'error'
        });
    });
}
