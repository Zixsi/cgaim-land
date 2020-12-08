$(document).ready(function () {
    $('.delete-item-btn').on('click', function () {
        if (confirm("Вы действительно хотите УДАЛИТЬ этот элемент?") === false) {
            return false;
        }
    });
    
    lectureHandler();
    blockHandler();
});

function lectureHandler()
{
    if ($('#tmpl-lecture-row').length === 0) {
        return;
    }
    
    var tmpl = $('#tmpl-lecture-row').html();
    var container = $('#lecture-row-container');
    var index = $('#add-lecture-row').data('index');
    
    $('#add-lecture-row').on('click', function() {
        let html = tmpl.replace(/{INDEX}/g, index);
        index++;
        container.append(html);
    });
    
    container.on('click', '.delete-lecture-row', function() {
        console.log($(this));
        $(this).closest('.row').remove();
    });
}

function blockHandler()
{
    if ($('#block-type-trigger').length === 0) {
        return;
    }

    $('#block-type-trigger').on('change', function() {
        $('.block-type-variant').addClass('d-none');
        $('#type_' + $(this).val()).removeClass('d-none'); 
    });
}