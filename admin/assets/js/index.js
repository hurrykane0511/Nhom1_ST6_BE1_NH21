//let list = document.querySelectorAll(".navigation li");
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");



function activeLink() {
  //list.forEach((item) => item.classList.remove("hovered"));
  this.classList.add("hovered");
  main.classList.remove("active");
  navigation.classList.remove("active");
}

//list.forEach((item) => item.addEventListener("click", activeLink));
toggle.addEventListener("click", function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
});

function loadchart() {
  if (document.querySelector("#myChart")) {
    const labels = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "June",
      "July",
      "Aug",
      "Sept",
      "Oct",
      "Nov",
      "Dec",
    ];

    const revenue = {
      labels,
      datasets: [{
          backgroundColor: "#FF00E4",
          borderWidth: 1,
          borderColor: "#FF00E4",
          label: "This Year",
          data: [100, 300, 250, 400, 350, 325, 380, 425, 450, 435, 366, 388],
        },
        {
          backgroundColor: "#FF9300",
          borderWidth: 1,
          borderColor: "#FF9300",
          label: "Last Year",
          data: [250, 200, 240, 390, 250, 425, 380, 225, 420, 350, 488, 300],
        },
      ],
    };
    const config = {
      type: "line",
      data: revenue,
      options: {
        responsive: true
      },
    };
    new Chart(document.getElementById("myChart"), config);
  }
}
loadchart();


window.addEventListener("scroll", function () {
  if (this.scrollY != 0) {
    document.querySelector(".topbar").classList.add("scrolling");
  } else {
    document.querySelector(".topbar").classList.remove("scrolling");
  }
});

