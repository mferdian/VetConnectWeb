
document.addEventListener('DOMContentLoaded', function () {
    const vetDateSelect = document.getElementById('vet_date_id');
    const vetTimeSelect = document.getElementById('vet_time_id');

    vetDateSelect.addEventListener('change', function () {
        const dateId = this.value;
        if (dateId) {
            // Clear previous options
            vetTimeSelect.innerHTML = '<option value="">Memuat waktu...</option>';

            // Gunakan URL yang sesuai dengan route Laravel Anda
            fetch(`/booking/get-times/${dateId}`)
                .then(response => response.json())
                .then(data => {
                    // Clear the current options
                    vetTimeSelect.innerHTML = '<option value="">Pilih Jam Konsultasi</option>';

                    // Add new options based on the fetched data
                    data.forEach(time => {
                        const option = document.createElement('option');
                        option.value = time.id;
                        option.textContent = `${time.jam_mulai} - ${time.jam_selesai}`;
                        vetTimeSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching vet times:', error);
                    vetTimeSelect.innerHTML = '<option value="">Gagal memuat waktu</option>';
                });
        } else {
            // If no date is selected, reset the vet time select
            vetTimeSelect.innerHTML = '<option value="">Pilih tanggal terlebih dahulu</option>';
        }
    });

    // Tambahkan ini untuk mengisi waktu secara otomatis saat halaman dimuat
    if (vetDateSelect.value) {
        vetDateSelect.dispatchEvent(new Event('change'));
    }
});
