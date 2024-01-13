const darkMode = $('.dark-mode');

darkMode.on('click', () => {
    $('body').toggleClass('dark-mode-variables')
    darkMode.find('span:nth-child(1)').toggleClass('active');
    darkMode.find('span:nth-child(2)').toggleClass('active');
})

Orders.forEach(order => {
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class="${order.status === 'Đã huỷ' ? 'text-danger' : order.status === 'Chờ xác nhận' ? 'text-warning' : 'text-success'}">${order.status}</td>
        <td><a class="text-primary" href="#">Chi tiết</a></td>
    `;
    $('table tbody').append($('<tr>').html(trContent));
});
