import header from "./header";


(function () {
  const maxval = document.querySelector("#max");
  const minval = document.querySelector("#min");

  maxval.addEventListener("change", function () {
    if (this.value < minval.min) {
      this.value = minval.min;
    }
    if (this.value > this.max) {
      this.value = this.max;
    }
    minval.max = maxval.value;
  });
  minval.addEventListener("change", function () {
    if (this.value > maxval.max) {
      this.value = maxval.max;
    }
    if (this.value < this.min) {
      this.value = this.min;
    }
    maxval.min = minval.value;
  });
})();

header();
