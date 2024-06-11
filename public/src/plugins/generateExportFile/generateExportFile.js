function exportToPDF() {
  var doc = new jsPDF();
  doc.autoTable({ html: ".data-table" });
  doc.save("table.pdf");
}

function exportToExcel() {
  var wb = XLSX.utils.table_to_book(document.querySelector(".data-table"), {
    sheet: "Sheet JS",
  });
  XLSX.writeFile(wb, "table.xlsx");
}
