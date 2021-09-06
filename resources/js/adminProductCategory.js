$(document).ready(function () {
    $(document).on('click', '.click-cell', function(){
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

});