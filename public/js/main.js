
function addToChart(id) {
    var count = $('#product_' + id).val();
    if (count == '') count = 0;

    if (count > 0) {
        $.get('/customer/ajax.php', {
            page: 'chart',
            action: 'addToChart',
            product: id,
            count: count
        },
        function(data){
            $('#chart_content').html($(data).find('result').html());
            $('#product_' + id).val('');

        },
        'html');
    }
}

function countChart(id) {
    var count = $('#buying_' + id).val();
    if (count == '') count = 0;

    $.get('/customer/ajax.php', {
        page: 'chart',
        action: 'countChart',
        product: id,
        count: count
    },
    function(data){
        $('#chart_content').html($(data).find('result').html());
    },
    'html');
}

function order() {
    var orderList = new Array();

    $('#chart_content').find('input').each(
        function(index, Element){
            var name = $(Element).attr('id').toString().split('_');
            orderList.push({
                product: name[1],
                count: $(Element).val()
            });
        });

    $.get('/customer/ajax.php', {
        page: 'chart',
        action: 'order',
        product_list: orderList
    },
    function(data){
        $('#chart_content').html($(data).find('result').html());
    },
    'html');
}

function showInfo(id) {
    if ($('#productinfo_' + id).css('display') == 'none') {
        $('#productinfo_' + id).css('display', 'block');
        $('#productshowlink_' + id).text("скрыть")
    } else {
        $('#productinfo_' + id).css('display', 'none');
        $('#productshowlink_' + id).text("подробнее...");
    }
}

function checkNum(fieldtitle)
{
    var val;

    if ($('#' + fieldtitle).val() == '')
        return alert('Введи только цифры');

    val = parseFloat($('#' + fieldtitle).val().toString().replace(',', '.'));
    if (isNaN(val))
        return alert('Введи только цифры');

    if (val != $('#' + fieldtitle).val().toString().replace(',', '.'))
        return alert('Введи только цифры');

    if (val <= 0)
        return alert('Введите положительное, а не отрицательное число!');
    return true;
}

function confirmDelete(name, url) {
    if (confirm("Вы подтверждаете удаление " + name + "?")) {
        //parent.location='http://емагазин.жкхинформ.рф/' + url;
        return true;
    } else {
        return false;
    }
}


