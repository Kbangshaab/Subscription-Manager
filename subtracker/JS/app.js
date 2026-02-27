$(document).ready(function() {
    console.log("JavaScript is loaded and running!");

    $('#add-sub-btn').click(function() {
        const subData = {
            name: $('#sub-name').val(),
            renew: $('#sub-renew').val(),
            price: $('#sub-price').val()
        };

        $.post('APP/add_sub.php', subData, function(response) {
            // Clear the inputs
            $('#sub-name').val('');
            $('#sub-renew').val('');
            $('#sub-price').val('');

            // Refresh the page to show the new data
            location.reload();
        });
    });
    
    $.getJSON('APP/get_subs.php', function(data) {
        console.log("Data received from PHP:", data);
        let tableRows = '';
        let totalMonthly = 0;


        if(data.length === 0) {
            tableRows = '<tr><td colspan="4">No subscriptions found in database.</td></tr>';
        } else {
            data.forEach(function(item) {
                totalMonthly += parseFloat(item.price);
                tableRows += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.renew}</td>
                        <td>${item.price}</td>
                        <td><button onclick="deleteSub(${item.id})">Delete</button></td>
                    </tr>`;
            });
        }
        $('#subscription-list').html(tableRows);
        $('#total-display').text(totalMonthly.toFixed(2));
    }).fail(function(err) {
        console.error("Error fetching data. Check your PHP path!", err);
    });
});
function deleteSub(id) {
    if (confirm("Are you sure you want to delete this subscription?")) {
        $.post('APP/delete_sub.php', { id: id }, function(response) {
            // After deleting, refresh the page to update the table
            location.reload();
        });
    }
}