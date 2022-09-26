<?php
include('header.php');
?>
</div>

<div class="slideshow-container">

<div class="mySlides">
  <h1>Aplikasi Manajemen Stok Barang</h1>
  <q>Aplikasi ini dapat digunakan untuk mencari jenis barang yang perlu dilakukan tindakan stok ulang berdasarkan pertimbangan stok yang tersedia, 
  nilai keuntungan, prioritas jenis barang dan tingkat penjualan barang</q>
  <p class="author">Home</p>
</div>

<div class="mySlides">
  <q>Menu Clustering digunakan untuk mengelompokkan data barang berdasarkan beberapa pertimbangan ke dalam 4 cluster yang berbeda</q>
  <p class="author">K-Means Clustering</p>
</div>

<div class="mySlides">
  <q>Menu KNN digunakan untuk mencari nilai terdekat dari jenis barang yang tersedia dengan suatu nilai yang memenuhi suatu barang untuk dilakukan stok ulang</q>
  <p class="author">K Nearest Neighbor</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php
include('footer.php');
?>