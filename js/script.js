var keyword = document.getElementById("keyword");
//var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

//tambah event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  //AJAX dulu yok
  var xhr = new XMLHttpRequest();

  //cek ajax sudah ready belum
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  //eksekusi ajax
  xhr.open("GET", "ajax/user.php?keyword=" + keyword.value, true);
  xhr.send();
});
