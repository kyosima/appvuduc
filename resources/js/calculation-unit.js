function destroyModal() {
    $('#calculation_unit_update').remove();
}

$(document).ready(function () {
    $('#table-calculation-unit').DataTable({
        ordering: false,
        dom: '<"wrapper d-flex justify-content-between mb-3"lf>tip'
    });

    $('body').click(function (e) {
        if (!$('#calculation_unit_update').hasClass('show')) {
            $('#calculation_unit_update').remove();
        }
    });

    $("form").validate({
        rules: {
            unitCode: {
                required: true,
            },
            unitName: {
                required: true,
            }
        },
        messages: {
            unitCode: "Không được để trống",
            unitName: "Không được để trống",
        }
    });


    // CREATE NEW CALCULATION UNIT
    $("#formCreateUnit").submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (response) {
                $('#calculation_unit_create .form-body').prepend(`<div class="bg-success p-2 mb-2">
                    <p class="text-light m-0">Đã thêm mới danh mục thành công</p>
                    </div>`);
                $('#table-calculation-unit tbody').empty();
                $('#table-calculation-unit tbody').append(response.html)
                setTimeout(function () {
                    $('#calculation_unit_create').modal('dispose')
                    $('#calculation_unit_create').hide()
                    $('.modal-backdrop.fade.show').remove()
                }, 1500);
            }
        });
    });


    // SHOW MODAL WHEN CLICK ELEMENT TO UPDATE
    $(document).on('click', '.modal-edit-unit', function () {
        $.ajax({
            type: "GET",
            url: $(this).data('route'),
            data: {
                id: $(this).data('unitid'),
            },
            success: function (response) {
                $('#calculation_unit_create').after(response.html)
                $('#calculation_unit_update').modal('show')
            }
        });
    })

});