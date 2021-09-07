$(document).ready(function () {
    $(document).on('click', '.click-cell', function () {
        var parent = $(this).parents('tr.has-child');
        parent.addClass('selected')
        var parentId = parent.data('categoryid')
        $(`tr.child-category[data-parentcat=${parentId}]`).css('display', 'table-row');
        $(`tr.child-category[data-parentcat=${parentId}]`).addClass('selected')
    })

    // SHOW MODAL WHEN CLICK ELEMENT TO UPDATE
    $(document).on('click', '.modal-edit-proCat', function () {
        $.ajax({
            type: "GET",
            url: $(this).data('route'),
            data: {
                id: $(this).data('unitid'),
            },
            success: function (response) {
                $('#product_category_create').after(response.html)
                $('#product_category_update').modal('show')
            }
        });
    })

    $('#proCatType').change(function (e) {
        e.preventDefault();
        var key = $(this).val()
        let html = '';
        switch (key) {
            case '1':
                $('#select-category').removeClass('hide-select-option')
                if (!$('#select-category-child-create').hasClass('hide-select-option')) {
                    $('#select-category-child-create').addClass('hide-select-option')
                }
                $.ajax({
                    type: "GET",
                    url: ajaxSelectCategory,
                    data: {
                        type: $(this).val()
                    },
                    success: function (response) {
                        console.log(response.data);
                        html = "<option value='' selected>Chọn ngành hàng</option>";
                        $.each(response.data, function(idx, val){
                            html += "<option value='"+val.id+"'>"+val.name+"</option>"; 
                        });
                        $('#select-category select').html('').append(html);
                    }
                });
                break;
            case '2':
                $('#select-category-child-create').removeClass('hide-select-option')
                if (!$('#select-category').hasClass('hide-select-option')) {
                    $('#select-category').addClass('hide-select-option')
                }
                $.ajax({
                    type: "GET",
                    url: ajaxSelectCategory,
                    data: {
                        type: $(this).val()
                    },
                    success: function (response) {
                        console.log(response.data);
                        html = "<option value='' selected>Chọn nhóm sản phẩm</option>";
                        $.each(response.data, function(idx, val){
                            html += "<option value='"+val.id+"'>"+val.name+"</option>"; 
                        });
                        $('#select-category-child-create select').html('').append(html);
                    }
                });
                break;

            default:
                if (!$('#select-category').hasClass('hide-select-option')) {
                    $('#select-category').addClass('hide-select-option')
                }
                if (!$('#select-category-child-create').hasClass('hide-select-option')) {
                    $('#select-category-child-create').addClass('hide-select-option')
                }
                break;
        }
    });

});

function destroyModal() {
    $('#product_category_update').remove();
}
