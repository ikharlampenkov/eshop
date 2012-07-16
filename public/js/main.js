function addToChart(id) {
    var count = $('#product_' + id).val();
    if (count == '') count = 0;

    if (count > 0) {
        $.get('/customer/ajax.php', {
                page:'chart',
                action:'addToChart',
                product:id,
                count:count
            },
            function (data) {
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
            page:'chart',
            action:'countChart',
            product:id,
            count:count
        },
        function (data) {
            $('#chart_content').html($(data).find('result').html());
        },
        'html');
}

function order() {
    var orderList = new Array();

    $('#chart_content').find('input').each(
        function (index, Element) {
            var name = $(Element).attr('id').toString().split('_');
            orderList.push({
                product:name[1],
                count:$(Element).val()
            });
        });

    $.get('/customer/ajax.php', {
            page:'chart',
            action:'order',
            product_list:orderList
        },
        function (data) {
            $('#chart_content').html($(data).find('result').html());
        },
        'html');
}

function addToChartS(id) {
    var count = $('#product_' + id).val();
    if (count == '') count = 0;

    if (count > 0) {
        $.get('/ajax.php', {
                page:'chart',
                action:'addToChart',
                product:id,
                count:count,
                tone: $('#tone').val()
            },
            function (data) {
                $('#chart_content').html($(data).find('result').html());
                $('#product_' + id).val('');

            },
            'html');
    }
}

function countChartS(id) {
    var count = $('#buying_' + id).val();
    if (count == '') count = 0;

    $.get('/ajax.php', {
            page:'chart',
            action:'countChart',
            product:id,
            count:count
        },
        function (data) {
            $('#chart_content').html($(data).find('result').html());
        },
        'html');
}

function orderS() {
    var orderList = new Array();

    $('#chart_content').find('input .buy-count').each(
        function (index, Element) {
            var name = $(Element).attr('id').toString().split('_');
            orderList.push({
                product:name[1],
                count:$(Element).val()
            });
        });

    $.get('/ajax.php', {
            page:'chart',
            action:'order',
            product_list:orderList,
            name:$('#name').val(),
            tel:$('#tel').val(),
            email:$('#email').val()
        },
        function (data) {
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

function checkNum(fieldtitle) {
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

function confirmDelete(name) {
    if (confirm("Вы подтверждаете удаление " + name + "?")) {
        return true;
    } else {
        return false;
    }
}

function checkSponsor() {

    /*

     $.get('http://my.tiande.ru/ajax_anketa_free_open.php?sponsor=' + $('#sponsor1').val(),
     null,
     function (data) {
     if (data == '0') {
     $('#sponsor_fio').val('Ваш спонсор: не указан');
     } else {
     $('#sponsor_fio').val('Ваш спонсор: ' + data);
     $('#checkboxsponsor').prop("disabled", false);
     }
     }
     );
     */

    $('#sponsor_fio').val('Ваш спонсор: ');
    $('#checkboxsponsor').prop("disabled", false);
}


var checkobj;

function agreeSubmit(el) {
    checkobj = el;
    form_submit = document.getElementById("confirm");
    sponsor_field = document.getElementById('sponsor1');
    form_submit.disabled = !checkobj.checked;
    //sponsor_field.disabled = checkobj.checked;
    if (checkobj.checked) sponsor_field.setAttribute('readonly', true);
    else sponsor_field.removeAttribute('readonly');
    if (form_submit.disabled) {
        form_submit.style.backgroundColor = '#fff';
        form_submit.style.color = '#004F99';
    } else {
        form_submit.style.backgroundColor = '#004F99';
        form_submit.style.color = '#fff';
    }
    //form_submit.style='background-color: #fff; text-color: #004F99';
}

function changeSMSPhone() {
    $("#smsphone").val($("#telefon2_1").val() + $("#telefon2_2").val() + $("#telefon2_3").val() + $("#telefon2_4").val());
}

$(document).ready(function () {
    if ($("#sms").attr("checked")) {
        $("#smsphone").removeAttr("disabled");
    } else {
        $("#smsphone").attr("disabled", "true");
    }
    $("#telefon2_1").change(changeSMSPhone);
    $("#telefon2_2").change(changeSMSPhone);
    $("#telefon2_3").change(changeSMSPhone);
    $("#telefon2_4").change(changeSMSPhone);
    $("#sms").click(function () {
        if ($(this).attr("checked")) {
            $("#smsphone").removeAttr("disabled");
            changeSMSPhone();
        } else {
            $("#smsphone").attr("disabled", "true");
        }
    });

    if ($("#spam").attr("checked")) {
        $("#spamemail").removeAttr("disabled");
    } else {
        $("#spamemail").attr("disabled", "true");
    }
    $("#email").change(function () {
        $("#spamemail").val($(this).val());
    });
    $("#spam").click(function () {
        if ($(this).attr("checked")) {
            $("#spamemail").removeAttr("disabled");
            $("#spamemail").val($("#email").val());
        } else {
            $("#spamemail").attr("disabled", "true");
        }
    });
});

function f_ton(pk_ton){
    $(".ton_input").css('border', '0.1em solid #fff');
    $("#ton_"+pk_ton).css('border', '0.1em solid #5e5e5e');
    document.img_name.src=document.getElementById("ton_"+pk_ton).src;
    $("#ton_text:first-child").empty();
    var text = "<span>"+$("#ton_"+pk_ton).attr("text")+"</span>"
    $("#ton_text").html(text);
    $("#tone").val(pk_ton);
}

$(document).ready(function() {

	$(".tt-menu li").hover(
		function() {
			$(this).find("ul:first").fadeIn(200);
			$(this).addClass("active");
		}, function() {
			$(this).find("ul:first").fadeOut(0);
			$(this).removeClass("active");
	});

	$(".tt-menu li:has(ul)").addClass("level-item");

    $('.carousel').carousel();
});

