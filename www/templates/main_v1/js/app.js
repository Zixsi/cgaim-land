$(document).ready(function () {

    $.fn.serializeControls = function () {
        var data = {};

        function buildInputObject(arr, val) {
            if (arr.length < 1)
                return val;
            var objkey = arr[0];
            if (objkey.slice(-1) == "]") {
                objkey = objkey.slice(0, -1);
            }
            var result = {};
            if (arr.length == 1) {
                result[objkey] = val;
            } else {
                arr.shift();
                var nestedVal = buildInputObject(arr, val);
                result[objkey] = nestedVal;
            }
            return result;
        }

        $.each(this.serializeArray(), function () {
            var val = this.value;
            var c = this.name.split("[");
            var a = buildInputObject(c, val);
            $.extend(true, data, a);
        });

        return data;
    }
    
    $('.select2-simple').select2();
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    appListener();
});

function formFiles(form)
{
    var files = [];
    $(form).find('input[type="file"]').each(function (i, e) {
        if ($(e)[0].files.length > 0)
            files.push({name: $(e).attr('name'), value: $(e)[0].files[0]});
    });

    return files;
}

function datepiker()
{
    if ($('.datepiker').length < 1)
        return;

    $.datetimepicker.setLocale('ru');

    $('.datepiker').datetimepicker({
        format: 'Y-m-d',
        formatDate: 'Y-m-d',
        lang: 'ru',
        timepicker: false,
        dayOfWeekStart: 1,
        scrollMonth: false
    });
}

function datepikerDb()
{
    if ($('.datepiker-db').length < 1)
        return;

    $.datetimepicker.setLocale('ru');

    $('.datepiker-db').datetimepicker({
        format: 'Y-m-d',
        formatDate: 'Y-m-d',
        lang: 'ru',
        timepicker: false,
        dayOfWeekStart: 1,
        scrollMonth: false
    });
}

function datetimepicker()
{
    if ($('.datetimepicker').length < 1)
        return;

    $.datetimepicker.setLocale('ru');

    $('.datetimepicker').datetimepicker({
        format: 'd.m.Y H:i:s',
        formatDate: 'd.m.Y',
        lang: 'ru',
        timepicker: true,
        dayOfWeekStart: 1,
        scrollMonth: false
    });
}

function datetimepicker2()
{
    if ($('.datetimepicker2').length < 1)
        return;

    $.datetimepicker.setLocale('ru');

    $('.datetimepicker2').datetimepicker({
        format: 'Y-m-d H:00:00',
        formatDate: 'Y-m-d',
        lang: 'ru',
        timepicker: true,
        dayOfWeekStart: 1,
        scrollMonth: false
    });
}

function appListener()
{
    datepiker();
    datepikerDb();
    datetimepicker();
    datetimepicker2();
    textEditor();
    
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    $('.file-upload-browse').on('click', function() {
        var file = $(this).parent().parent().parent().find('.file-upload-default');
        file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
}

function reloadPage(timeout = 0)
{
    setTimeout(function () {
        window.location.reload(true);
    }, timeout);
}

function textEditor()
{    
    if($('#editor1').length > 0) {
        var editor1Conf = ['bold','italic','underline'];
        var editor1 = new Simditor({
            id: 'editor1',
            textarea: $('#editor1'),
            toolbar: editor1Conf,
            pasteImage: false,
            cleanPaste: true,
            allowedTags: ['br', 'span', 'a', 'b', 'strong', 'i', 'strike', 'u', 'p']
        });
    }
    
    for (let i = 1; i <= 10; i++) {
        startSimpleEditor(i);
    }
}

function startSimpleEditor(number)
{
    if($('#simple-editor' + number).length === 0) {
        return;
    }
    
    var editor = new Simditor({
        id: 'simple-editor' + number,
        textarea: $('#simple-editor' + number),
        toolbar: ['bold','italic','underline'],
        pasteImage: false,
        cleanPaste: true,
        allowedTags: ['br', 'span', 'a', 'b', 'strong', 'i', 'strike', 'u', 'p']
    });
}

function ajaxQuery(url, params, callback)
{
    showPageLoader();
    setTimeout(function(){
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: params,
//            contentType: 'application/json; charset=utf-8',
            success: function (res) {
                if (res.result !== undefined && res.result !== null) {
                    if (callback && typeof (callback) === "function") {
                        callback(res.result);
                    }
                } else if (res.error) {
                    toastrMsg('error', res.error.message);
                }

                hidePageLoader();
            },
            error: function (e, code) {
                hidePageLoader();
                toastrMsg('error', 'AJAX ERROR');
            }
        });
    }, 300);
}

function showPageLoader()
{
    $('.page-loader').addClass('ld-loading');
}

function hidePageLoader()
{
    $('.page-loader').removeClass('ld-loading');
}

function toastrMsg(type, text)
{
    toastr[type](text, '');
}