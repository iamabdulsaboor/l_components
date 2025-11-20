document.addEventListener("DOMContentLoaded", () => {
  const homepageSliderWrapper = document.querySelector(
    ".shopSliderOne .swiper-wrapper"
  );

  // Run only if this slider exists
  if (!homepageSliderWrapper) return;

  fetch("assets/json/products.json")
    .then((res) => res.json())
    .then((products) => {
      if (!Array.isArray(products) || products.length === 0) return;

      // Select every 10th product (index 9, 19, 29, etc.)
      const everyTenthProduct = products.filter((_, i) => (i + 1) % 10 === 0);

      // Clear static slides
      homepageSliderWrapper.innerHTML = "";

      everyTenthProduct.forEach((product, index) => {
        const slide = document.createElement("div");
        slide.className = "swiper-slide";

        slide.innerHTML = `
          <div class="shop-card-items style1 wow fadeInUp" data-wow-delay=".${
            index + 3
          }s" style="margin:2px 20px;">
            <div class="shop-thumb">
              <img 
                src="assets/${product.images?.[0] || "images/placeholder.jpg"}" 
                alt="${product.name}" 
                onerror="this.src='assets/images/placeholder.jpg';"
              />
            </div>
            <div class="shop-content">
            <div class="abc" style="display:flex;flex-direction:row">
              <h3>
                <a href="shop-details.html?id=${product.id}">${product.name} (${
          "$" + product.price
        })</a>
              </h3>
</div>
              <ul class="star-wrapper style1">
                ${'<li><img src="assets/images/icon/starIcon.svg" alt="star" /></li>'.repeat(
                  5
                )}
              </ul>
              <p class="desc">${product.description}</p>
              <div class="shop-btn">
  <a href="shop-details.html?id=${product.id}" class="btn-shop">SHOP NOW</a>
</div>

            </div>
          </div>
        `;

        homepageSliderWrapper.appendChild(slide);
      });

      // Initialize Swiper ONLY for this section
      const sliderContainer = document.querySelector(".shopSliderOne .swiper");
      if (sliderContainer && typeof Swiper !== "undefined") {
        const sliderOptions = JSON.parse(
          sliderContainer.getAttribute("data-slider-options") || "{}"
        );

        // Destroy previous instance if any
        if (sliderContainer.swiper) {
          sliderContainer.swiper.destroy(true, true);
        }

        new Swiper(sliderContainer, {
          ...sliderOptions,
          pagination: {
            el: ".shopSliderOne .slider-pagination",
            clickable: true,
          },
        });
      }
    })
    .catch((err) => console.error("Error loading homepage products:", err));
});
