// resources/js/payment.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('payment-form');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Pembayaran Berhasil!',
                text: 'Anda akan diarahkan ke halaman pesanan.',
                icon: 'success',
                confirmButtonColor: '#497D74',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    }
});
