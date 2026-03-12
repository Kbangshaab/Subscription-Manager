$(document).ready(function() {
    let exchangeRate = 1;
    let currencySymbol = "kr";

    function loadSubscriptions() {
        $.getJSON('APP/get_subs.php', function(data) {
            let tableRows = '';
            let totalMonthly = 0;

            if (data.length === 0) {
                tableRows = '<tr><td colspan="4">No subscriptions found.</td></tr>';
            } else {
                data.forEach(function(item) {
                    let rawPrice = parseFloat(item.price);
                    let convertedPrice = rawPrice * exchangeRate;

                    totalMonthly += convertedPrice;

                    tableRows += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.renew}</td>
                            <td>${currencySymbol} ${convertedPrice.toFixed(2)}</td>
                            <td><button onclick="deleteSub(${item.id})">Delete</button></td>
                        </tr>`;
                });
            }
            $('#subscription-list').html(tableRows);
            $('#total-display').text(currencySymbol + " " + totalMonthly.toFixed(2));
        });
    }
    
    loadSubscriptions();

   
    $('#currency-selector').on('change', function() {
        exchangeRate = parseFloat($(this).val());

        
        const selectedText = $("#currency-selector option:selected").text();
        const match = selectedText.match(/\(([^)]+)\)/);
        currencySymbol = match ? match[1] : "";

        loadSubscriptions(); 
    });
    
    $('#add-sub-btn').click(function() {
        const subData = {
            name: $('#sub-name').val(),
            renew: $('#sub-renew').val(),
            price: $('#sub-price').val()
        };

        $.post('APP/add_sub.php', subData, function() {
            $('#sub-name').val('');
            $('#sub-renew').val('');
            $('#sub-price').val('');
            loadSubscriptions(); 
        });
    });
});

function deleteSub(id) {
    if (confirm("Are you sure?")) {
        $.post('APP/delete_sub.php', { id: id }, function() {
            location.reload();
        });
    }
}