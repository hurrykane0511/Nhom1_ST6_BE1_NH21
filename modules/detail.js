import Header from "./header.js";
import Showcase from "./showcase.js";

addEventListener("load", () => {
  Header();
});

gsap.registerPlugin(ScrollTrigger);
const ele = document.querySelector(".showcase-inner");

let pos = { top: 0, left: 0, x: 0, y: 0 };

const mouseDownHandler = function (e) {
  // Change the cursor and prevent user from selecting the text
  ele.style.cursor = "grabbing";
  ele.style.userSelect = "none";

  pos = {
    // The current scroll
    left: ele.scrollLeft,
    top: ele.scrollTop,
    // Get the current mouse position
    x: e.clientX,
    y: e.clientY,
  };

  document.addEventListener("mousemove", mouseMoveHandler);
  document.addEventListener("mouseup", mouseUpHandler);
};

const mouseMoveHandler = function (e) {
  // How far the mouse has been moved
  const dx = e.clientX - pos.x;
  const dy = e.clientY - pos.y;

  // Scroll the element
  ele.scrollTop = pos.top - dy;
  ele.scrollLeft = pos.left - dx;
};
const mouseUpHandler = function () {
  document.removeEventListener("mousemove", mouseMoveHandler);
  document.removeEventListener("mouseup", mouseUpHandler);

  ele.style.cursor = "grab";
  ele.style.removeProperty("user-select");
};

ele.addEventListener("mousedown", mouseDownHandler);

gsap.from(".title", {
  scrollTrigger: {
    trigger: ".decription-wrap",
    start: "top 80%",
    toggleActions: "play complete none reset",
  },
  y: 50,
  opacity: 0,
});

gsap.from(".product-card", {
  scrollTrigger: {
    trigger: ".showcase",
    start: "top 80%",
 
    toggleActions: "play complete none none",
  },
  x: 200,
  opacity: 0,
  duration: 1,
  stagger: { amount: 0.2 },
  ease: "Power1.easeOut",
});

gsap.from(".showcase-title-box", {
  scrollTrigger: {
    trigger: ".showcase",
    start: "top 70%",
 
    toggleActions: "play complete none none",
  },
  y: 50,
  opacity: 0,
});

const imgTriggers = document.querySelectorAll(".img");
const panel = document.querySelector("#imgDetails");

imgTriggers.forEach((el) => {
  new Drift(el, {
    paneContainer: panel,
    zoomFactor: 1.5,
    inlinePane: false,
    handleTouch: false,
  });
});

const img_links = document.querySelectorAll(".img-link1");
const img_boxs = document.querySelectorAll(".img-box");

img_links.forEach((el, idx) => {
  el.addEventListener("click", () => {
    img_links.forEach((item) => {
      item.classList.remove("active");
    });

    el.classList.add("active");

    img_boxs.forEach((bx, i) => {
      bx.setAttribute(
        "style",
        `--i:${i};transform: translateX(${idx * -1 * 100}%);`
      );
    });
  });
});


