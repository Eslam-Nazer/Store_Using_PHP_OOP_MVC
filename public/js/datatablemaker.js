// DataTable Plugin


let dataChecker = document.querySelector('#data');
// data = $('#data').DataTable({
//     order: [],
//     language: {
//         search: "بحث:"
//     }
// });

if (dataChecker !== null) {
    if (dataChecker.classList.contains('ar')) {
        let data = $('#data').DataTable({
            order: [],
            language: {
                search: "بحث:",
                lengthMenu: "_MENU_ عدد الصفوف في الصفحة"
            }
        });
    } else {
        data = $('#data').DataTable({
            order: [],
        });
    }
}