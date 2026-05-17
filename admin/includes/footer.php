</main> <!-- Penutup main dari header.php -->
    </div> <!-- Penutup content-wrapper -->
</div> <!-- Penutup wrapper -->

<!-- Script Bootstrap & SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Engine Animasi Pop Up Hapus Modern
    function konfirmasiHapus(event, url) {
        event.preventDefault();
        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Data yang dihapus beserta gambarnya tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#047857',
            confirmButtonText: 'Ya, Musnahkan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Eksekusi link hapus jika disetujui
            }
        })
    }
</script>
</body>
</html>