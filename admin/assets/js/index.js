let list = document.querySelectorAll(".navigation li");
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
const addProduct = document.querySelector('.add-product');


function activeLink() {
  list.forEach((item) => item.classList.remove("hovered"));
  this.classList.add("hovered");
  // main.classList.remove("active");
  // navigation.classList.remove("active");
}

list.forEach((item) => item.addEventListener("click", activeLink));
toggle.addEventListener("click", function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
});



window.addEventListener("scroll", function () {
  if (this.scrollY != 0) {
    document.querySelector(".topbar").classList.add("scrolling");
  } else {
    document.querySelector(".topbar").classList.remove("scrolling");
  }
});

