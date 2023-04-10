$(document).ready(function() {
    $(".custom-course").on("change", function() {
        window.location = $(this).val();
    });
});