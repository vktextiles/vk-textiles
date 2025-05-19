
<?php
include 'header.php';
?>




  <!-- Hero section -->
  <div class="mainbox d-flex flex-column justify-content-center align-items-center">
    <div class="container py-5">
      <div id="productContainer" class="fade-in productsgriid"></div>
    </div>
  </div>

  <?php include 'footer.php';
  ?>





<script>
  const urlParams = new URLSearchParams(window.location.search);
  const productId = urlParams.get("id");

  fetch("uniforms.json")
    .then(res => res.json())
    .then(data => {
      const product = data.find(p => p.id == productId);
      if (product) showProduct(product);
      else document.getElementById("productContainer").innerHTML = "<p>Product not found.</p>";
    });

  function showProduct(product) {
    const container = document.getElementById("productContainer");

    // Use fallback if missing
    const types = Array.isArray(product.type) && product.type.length > 0 ?
      product.type :
      [{
        label: "Standard",
        price: product.price || 0
      }];
    const sizes = Array.isArray(product.sizes) && product.sizes.length > 0 ?
      product.sizes :
      ["Single Size"];
    const colors = Array.isArray(product.colors) && product.colors.length > 0 ?
      product.colors :
      [{
        name: "Single Color",
        image: product.image
      }];

    const defaultImage = colors[0].image;
    const defaultPrice = types[0].price;

    container.innerHTML = `
      <div class="row pt-3 pb-3">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img id="productImage" src="${defaultImage}" class="img-fluid rounded shadow-sm d-flex justify-content-between align-items-center" alt="${product.name}">
        </div>
        <div class="col-md-6 mt-1 mt-lg-5 prdoctboxx">
          <h2>${product.name}</h2>
          
          <h1 id="priceDisplay" class="text-success mb-3">₹${defaultPrice}</h1>

          <div class="mb-3 mt-2">
            <strong>Type:</strong><br>
            ${types.map(t => `<button class="btn btn-outline-primary btn-option type-btn" data-price="${t.price}">${t.label}</button>`).join('')}
          </div>

          <div class="mb-3 mt-2">
            <strong>Size:</strong><br>
            ${sizes.map(s => `<button class="btn btn-outline-secondary  size-btn">${s}</button>`).join('')}
          </div>

          <div class="mb-3 mt-2">
            <strong>Color:</strong><br>
            ${colors.map(c => `<button class="btn btn-outline-dark btn-option color-btn" data-img="${c.image}">${c.name}</button>`).join('')}
          </div>
        </div>
      </div>
    `;

    // Add event listeners for type buttons
    document.querySelectorAll(".type-btn").forEach(btn => {
      btn.addEventListener("click", () => {
        document.getElementById("priceDisplay").textContent = "₹" + btn.dataset.price;
        setActive("type-btn", btn);
      });
    });

    // Add event listeners for color buttons
    document.querySelectorAll(".color-btn").forEach(btn => {
      btn.addEventListener("click", () => {
        const imgSrc = btn.getAttribute("data-img");
        document.getElementById("productImage").src = imgSrc;
        setActive("color-btn", btn);
      });
    });

    // Set defaults
    document.querySelector(".type-btn")?.classList.add("active");
    document.querySelector(".color-btn")?.classList.add("active");
  }

  function setActive(className, activeBtn) {
    document.querySelectorAll("." + className).forEach(btn => btn.classList.remove("active"));
    activeBtn.classList.add("active");
  }
</script>

<script>
    const header = document.getElementById("header");

    window.addEventListener("scroll", () => {
      if (window.scrollY > 10) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  </script>


