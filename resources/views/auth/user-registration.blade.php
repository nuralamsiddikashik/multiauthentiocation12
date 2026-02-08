<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h3>Create User</h3>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('user.store') }}">
@csrf

<input type="text" name="name" placeholder="Name"><br><br>
<input type="email" name="email" placeholder="Email"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<input type="text" name="phone" placeholder="Phone"><br><br>
<input type="text" name="address" placeholder="Address"><br><br>

<!-- Division -->
<select id="division" name="state">
    <option value="">বিভাগ নির্বাচন করুন</option>
</select>
<br><br>

<!-- District -->
<select id="district" name="city">
    <option value="">জেলা নির্বাচন করুন</option>
</select>
<br><br>

<!-- Upazila (only UI) -->
<select id="upazila">
    <option value="">উপজেলা নির্বাচন করুন</option>
</select>
<br><br>

<input type="text" name="zip" placeholder="ZIP"><br><br>

<button type="submit">Save User</button>

</form>

<script>
$(function () {

    // ✅ Load Divisions
    $.get('/divisions', function (res) {
        res.data.forEach(item => {
            $('#division').append(
                `<option value="${item.division}">${item.division}</option>`
            );
        });
    });

    // ✅ Division → District
    $('#division').on('change', function () {

        let division = $(this).val();

        $('#district').html('<option value="">জেলা নির্বাচন করুন</option>');
        $('#upazila').html('<option value="">উপজেলা নির্বাচন করুন</option>');

        if (!division) return;

        $.get(`/districts/${division}`, function (res) {
            res.data.forEach(item => {
                $('#district').append(
                    `<option value="${item.district}">
                        ${item.district}
                     </option>`
                );
            });
        });
    });

    // ✅ District → Upazila (REAL RESPONSE FIX)
    $('#district').on('change', function () {

        let district = $(this).val();

        $('#upazila').html('<option value="">উপজেলা নির্বাচন করুন</option>');

        if (!district) return;

        $.get(`/upazilas/${district}`, function (res) {

            // real API structure
            let upazilas = res.data[0].upazillas;

            upazilas.forEach(name => {
                $('#upazila').append(
                    `<option value="${name}">${name}</option>`
                );
            });
        });
    });

});
</script>

</body>
</html>
