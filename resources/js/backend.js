require('./bootstrap');
require('../../node_modules/jquery-ui/ui/widgets/sortable.js');

$(".ui-sortable").sortable({
    items: '.sortable',
    cursor: 'move',
    opacity: 0.6,
    update: (event, ui) => {
        let order = []
        $('.sortable').each((index, element) => {
            order.push({
                id: $(element).attr('data-id'),
                position: index + 1
            })
        }).removeAttr('style')

        $.ajax({
            type: "POST",
            dataType: "json",
            url: $(".ui-sortable").data('url'),
            data: {
                order: order,
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        })
    }
})
