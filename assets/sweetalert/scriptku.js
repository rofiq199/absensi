var flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire(
        'Data Berhasil ' + flashData,
        '',
        'success'
    );
}

