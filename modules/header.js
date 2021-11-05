const Header = () => {
  const search = document.querySelector(".search-popup");
  const searchbtn = document.querySelector(".search-box-handle");
  const closeboxsearch = document.querySelector(".close-box.search");
  searchbtn.addEventListener("click", () => {
    search.classList.add("active");
  });
  closeboxsearch.addEventListener("click", function () {
    search.classList.remove("active");
  });
};
export default Header;
