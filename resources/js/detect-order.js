$(document).on('submit', '#form-detect-order', function(event) {
    event.preventDefault();
    $(".result-detect-order").html('<div class="text-center"><div class="spinner-border text-primary"></div></div>');
    $.ajax({
        url: $(this).data('action'),
        type: 'POST',
        dataType: 'html',
        data: $(this).serialize(),
    })
    .done(function(data) {
        $(".result-detect-order").html(data);
    })
    .fail(function() {
        $(".result-detect-order").html('');
    });
});