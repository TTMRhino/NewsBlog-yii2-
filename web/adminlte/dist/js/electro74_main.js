$('#items-maingroup_id').click(function() {
    const maingroup_id = $(this).val();

    $.ajax({
        url: '/admin/items/subgroup-by-maingroup',
        data: { maingroup_id: maingroup_id },
        type: 'GET',
        success: function(res) {

            $('#items-subgroup_id').html(res);
        },
        error: function(res) {
            console.error('ошибка ajax запроса');
            console.error(res);
        }
    });
});