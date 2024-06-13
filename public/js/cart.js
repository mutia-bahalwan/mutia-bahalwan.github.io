document.addEventListener('DOMContentLoaded', function() {
    // Mengambil semua tombol "Tambahkan"
    var tambahkanButtons = document.querySelectorAll('.tambahkan');

    // Menambahkan event listener untuk setiap tombol "Tambahkan"
    tambahkanButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Dapatkan form yang berkaitan dengan tombol ini
            var form = this.closest('.add-to-cart-form');
            var formData = new FormData(form);

            // Mengirim data ke backend menggunakan fetch
            fetch('/add-to-cart', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                } else {
                    alert('Terjadi kesalahan saat menambahkan ke keranjang');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
