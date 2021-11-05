const Showcase = () => {
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

  gsap.from(".slogan-content", {
    scrollTrigger: {
      trigger: ".intro",

      start: "top 70%",
      toggleActions: "play complete none reset",
      end: "bottom center",
    },
    opacity: 0,
    duration: 1,
  });

  gsap.from(".product-card", {
    scrollTrigger: {
      trigger: ".showcase",
      start: "top 70%",
      toggleActions: "play complete none reset",
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
      toggleActions: "play complete reverse reset",
    },
    y: 50,
    opacity: 0,
  });

  gsap.from(".brand-box", {
    scrollTrigger: {
      trigger: ".brands-list",
      start: "top 70%",
      toggleActions: "play complete reverse reset",

    },
    opacity: 0,
    stagger: 0.3,
  });
};
export default Showcase;
