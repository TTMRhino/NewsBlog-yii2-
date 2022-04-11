$(document).ready(function() {



    $('#page_size').change(function() {

        Cookies.set('pageSize', $(this).val())
        location.reload();

    });
});