//Sweetalert
const swalFlash = $(".swal").data("swal");
if (swalFlash) {
  swal({
    title: "Data Berhasil",
    text: swalFlash,
    icon: "success",
    buttons: {
      confirm: {
        className: "btn btn-success",
      },
    },
  });
}
//Sweetalert
const swalLogin = $(".swal-login").data("swal");
if (swalLogin) {
  swal({
    text: swalLogin,
    icon: "error",
    Button: false,
    timer: 3000,
  });
}
const swalLogout = $(".swal-logout").data("swal");
if (swalLogout) {
  swal({
    text: swalLogout,
    icon: "success",
    Button: false,
    timer: 3000,
  });
}

//Alert Notifikasi

// const swalFlash = $(".swal").data("swal");
// if (swalFlash) {
//   var placementFrom = "top";
//   var placementAlign = "center";
//   var state = "success";
//   var style = "withicon";
//   var content = {};

//   content.message = "Data Kecamatan berhasil ditambahkan";
//   content.title = "Berhasil" + swalFlash;
//   content.icon = "fa fa-bell";

//   $.notify(content, {
//     type: state,
//     placement: {
//       from: placementFrom,
//       align: placementAlign,
//     },
//     timer: 1000,
//     delay: 0,
//   });
// }
