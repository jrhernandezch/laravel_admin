/*const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});*/

if ($( "#alert-msg" ).length) {
    toastr.success('&nbsp; ' + $('#alert-msg').data('msg'));
}