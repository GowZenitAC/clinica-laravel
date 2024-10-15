$(document).ready(function() {
    $('#pacientes-table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        responsive: true,
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
})

$("#formDelete").click(function (e) {
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      buttons: {
        confirm: {
          text: "Yes, delete it!",
          className: "btn btn-success",
        },
        cancel: {
          visible: true,
          className: "btn btn-danger",
        },
      },
    }).then((Delete) => {
      if (Delete) {
        this.submit();
      } else {
        swal.close();
      }
    });
  });