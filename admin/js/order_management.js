const $$ = document.querySelectorAll.bind(document)
const $ = document.querySelector.bind(document)

const refuseButtons = $$('.refuse')
const approveButtons = $$('.approve')

refuseButtons.forEach((refuseButton, index) => {
    refuseButton.onclick = (e) => {

        const orderIDDelete = refuseButton.getAttribute('data_id')
        fetch('./handle/orderDetete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ orderIDDelete }),
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data === 'xóa thành công') {
                    alert("Từ chối thành công (T_T)")
                    window.location.reload()
                }
            })

    };
});

approveButtons.forEach((approveButton, index) => {
    approveButton.onclick = (e) => {
        const orderIDApproval = approveButton.getAttribute('data_id')
        fetch('./handle/orderPD.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ orderIDApproval }),
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data === 'phê duyệt thành công') {
                    alert("phê duyệt thành công")
                    window.location.reload()
                }
            })

    };
});
