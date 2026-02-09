$(function () {
    $.get("/divisions", function (res) {
        res.data.forEach((item) => {
            $("#division").append(
                `<option value="${item.division}">${item.division}</option>`,
            );
        });
    });

    $("#division").on("change", function () {
        let division = $(this).val();

        $("#district").html('<option value="">Select District</option>');
        $("#upazila").html('<option value="">Select Upazila</option>');

        if (!division) return;

        $.get(`/districts/${division}`, function (res) {
            res.data.forEach((item) => {
                $("#district").append(
                    `<option value="${item.district}">
                        ${item.district}
                     </option>`,
                );
            });
        });
    });

    $("#district").on("change", function () {
        let district = $(this).val();

        $("#upazila").html('<option value="">Select your upazila</option>');

        if (!district) return;

        $.get(`/upazilas/${district}`, function (res) {
            // real API structure
            let upazilas = res.data[0].upazillas;

            upazilas.forEach((name) => {
                $("#upazila").append(
                    `<option value="${name}">${name}</option>`,
                );
            });
        });
    });
});
