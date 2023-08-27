import "./bootstrap";
import "datatables.net-bs5";
import "datatables.net-buttons-bs5";
import.meta.glob(["../images/**"]);

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});


// $(document).ready(function () {
//   $('#satker').on('change', function () {
//       var selectedSatker = $(this).val();
//       var jabatanDropdown = $('#jabatan');

//       // Fetch the available "jabatan" options based on the selected "satker" via AJAX or from a JavaScript object
//       // Replace this with your own logic to fetch the available "jabatan" options

//       // For example, if you have a JavaScript object with available "jabatan" options:
//       var availableJabatans = {
//           1: [{ id: 1, nama_jabatan: 'Jabatan 1' }, { id: 2, nama_jabatan: 'Jabatan 2' }],
//           2: [{ id: 3, nama_jabatan: 'Jabatan 3' }, { id: 4, nama_jabatan: 'Jabatan 4' }]
//           // Add more "jabatan" options for other "satker" IDs as needed
//       };

//       // Clear the current "jabatan" options
//       jabatanDropdown.empty();

//       // Populate the "jabatan" dropdown with options based on the selected "satker"
//       if (selectedSatker in availableJabatans) {
//           var jabatans = availableJabatans[selectedSatker];
//           $.each(jabatans, function (index, jabatan) {
//               jabatanDropdown.append(new Option(jabatan.nama_jabatan, jabatan.id));
//           });
//       }
//   });
// });
