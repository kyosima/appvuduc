$(document).ready(function () {
    $(document).on('click', '.click-cell', function(){
        var parent = $(this).parents('tr.has-child');
        parent.addClass('selected')
        var parentId = parent.data('categoryid')
        $(`tr.child-category[data-parentcat=${parentId}]`).css('display', 'table-row');
        $(`tr.child-category[data-parentcat=${parentId}]`).addClass('selected')
    })
});