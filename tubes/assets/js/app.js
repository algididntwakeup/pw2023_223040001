/* ini buat alert konfirmasi sebelum ngehapus data */
var elems = document.getElementsByClassName('confirm');
var confirmIt = function (e) {
  if (!confirm('Apakah yakin akan dihapus?')) e.preventDefault();
};

for (let i = 0, l = elems.length; i < l; i++) {
  elems[i].addEventListener('click', confirmIt, false);
}
