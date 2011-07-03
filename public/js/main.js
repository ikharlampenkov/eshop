
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
       orderList.push({product: name[1], count: $(Element).val()});
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

