const message = $('.message').data('flashdata');
if (message) {
    Swal.fire({
        icon: 'success',
        title: message,
        text: '',
        showConfirmButton: false,
        timer: 1500
    })
}