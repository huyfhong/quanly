$(document).ready(function () {
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});
$('#formreg').submit(function () {
  var username = $("input[name*='username']").val();
  if(username.length ===0 || username.length < 6){
      $("input[name*='username']").focus();
      $('#noteFrom').html("Username chưa hợp lệ ");
      return false;
  }
var password = $("input[name*='password']").val();
if(password.length === 0 || password.length < 6){
  $("input[name*='password']").focus();
  $('#noteFrom').html("Password chưa hợp lệ ");
  return false;
}
var hoten = $("input[name*='hoten']").val();
if(hoten.length === 0 || hoten.length < 6){
  $("input[name*='hoten']").focus();
  $('#noteFrom').html("Họ tên  chưa hợp lệ ");
  return false;
}
var ngaysinh = $("input[name*='ngaysinh']").val();
if(ngaysinh.length === 0){
  $("input[name*='ngaysinh']").focus();
  $('#noteFrom').html("Ngày sinh chưa hợp lệ ");
  return false;
}
var diachi = $("input[name*='diachi']").val();
if(diachi.length === 0){
  $("input[name*='diachi']").focus();
  $('#noteFrom').html("Địa chỉ chưa hợp lệ ");
  return false;
}
var dienthoai= $("input[name*='dienthoai']").val();
if(dienthoai.length === 0){
  $("input[name*='dienthoai']").focus();
  $('#noteFrom').html("Điện thoại chưa hợp lệ ");
  return false;
}
return true;
});
