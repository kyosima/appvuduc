$(document).ready(function () {
    $("form").validate({
        ignore: [],
        rules: {
            feature_img: {
                required: true,
            },
            course_title: {
                required: true,
            },
            course_vpoint: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_2: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_1: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_platinum: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_diamond: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_gold: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_silver: {
                min: 0.1,
                required: true,
                number: true,
            },
            course_discount_member: {
                min: 0.1,
                required: true,
                number: true,
            },
        },
        messages: {
            feature_img: "Không được để trống",
            course_title: "Không được để trống",
            course_product: "Không được để trống",
            course_vpoint: "Không được để trống",
            course_discount_2: "Không được để trống",
            course_discount_1: "Không được để trống",
            course_discount_platinum: "Không được để trống",
            course_discount_diamond: "Không được để trống",
            course_discount_gold: "Không được để trống",
            course_discount_silver: "Không được để trống",
            course_discount_member: "Không được để trống",
        }
    });
});