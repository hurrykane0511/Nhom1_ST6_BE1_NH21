
class Main {
  constructor() {
    this.images = [
      "./assets/images/image0.jpg",
      "./assets/images/image1.jpg",
      "./assets/images/image2.jpg",
      "./assets/images/image3.jpg",
    ];
    this.sliderText = [
      "CHANEL O5",
      "GIOIA ARMANI",
      "L'Eau LAURISSI",
      "MISS DIOR",
    ];
    this.sliderPath = [];
    this.title = document.getElementById("slideTitle");
    this.item = document.getElementById("slideItem");
    this.slideBar = document.querySelector(".slider-bar");
    this.slideNum = 0;
    this.interval;
    this.loader();
  }

  //Đảm bảo source ảnh được chạy trước khi chạy slider
  async loader() {
    await Promise.all(
      this.images.map(async (item, index) => await this.imagePush(item, index))
    );
    this.init();
    this.controlSlide();
  }
  async imagePush(obj, index) {
    const img = new Image();
    img.src = obj;
    await img.decode();

    this.sliderPath[index] = {
      text: this.sliderText[index],
      img: img,
    };
  }

  /* Chạy loader trước khi chạy và setInterval auto run slider */
  init() {
    this.interval = setInterval(this.slider.bind(this), 6000);
  }

  //Control Slide item cover, text để đậy hình trong khi đổi source ảnh item
  slider() {
    gsap
      .timeline()
      .to(".-slide-title", {
        x: 50,
        opacity: 0,
        duration: 0.5,
      })
      .set(
        ".-slide-item",
        {
          className: "-slide-item -slide-item__cover",
        },
        "-=0.5"
      )
      .add(this.setItem.bind(this), 1.5)
      .set(".-slide-title", {
        x: -50,
      })
      .to(".-slide-title", {
        x: 0,
        opacity: 0.8,
        duration: 0.5,
      })
      .set(
        ".-slide-item",
        {
          className: "-slide-item",
        },
        "-=0.2"
      );
  }

  //Set item source
  setItem() {
    this.slideNum++;
    if (this.slideNum >= 4) {
      this.slideNum = 0;
    }
    this.slideBar.style.setProperty("--data-pos", `${this.slideNum * 25}%`);
    this.item.style.backgroundImage = `url(${
      this.sliderPath[this.slideNum].img.currentSrc
    })`;
    this.title.innerText = this.sliderPath[this.slideNum].text;
  }

  //Thêm sự kiện click chuyển slider
  controlSlide() {
    const btn = document.querySelectorAll(".ctrl-slide-btn");
    btn.forEach((el, idx) => {
      el.addEventListener("click", () => {
        clearInterval(this.interval);
        if (idx === 0) {
          this.slideNum -= 2;
          if (this.slideNum < -1) {
            this.slideNum = 2;
          }
        }
        this.slider();
        this.interval = setInterval(this.slider.bind(this), 6000);
      });
    });
  }
}
export default Main;
