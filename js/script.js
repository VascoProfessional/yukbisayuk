const tombolCari = document.querySelector(".tombol-cari");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

// menghilangkan tombol cari
tombolCari.style.display = "none";

// event ketik menuliskan keyword
keyword.addEventListener("keyup", function () {
  // ajax
  // xhtmlhttprequest
  // const xhr = new XMLHttpRequest();

  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.response;
  //   }
  // };

  // xhr.open("get", "ajax/ajax_cari.php?keyword=" + keyword.value);
  // xhr.send();

  // fetch()
  fetch("ajax/ajax_cari.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});

// Preview Image untuk tambah dan ubah
function previewImage() {
  const gambar = document.querySelector(".gambar");
  const imgPreview = document.querySelector(".img-preview");

  const OFReader = new FileReader();
  OFReader.readAsDataURL(gambar.files[0]);

  OFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}
