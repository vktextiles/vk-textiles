<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VkTextiles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
  .top-header {
    position: fixed;
    top: 10px;
    left: 0;
    right: 0;
    width: 80%;
    margin: 0 auto;
    background: #fff;
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 0.7rem 1.2rem;
    border-radius: 10px;
  }

  .top-header .logo {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    animation: popIn 0.8s ease-out;
  }

  .brand-name {
    font-size: 1.5rem;
    font-weight: 700;
    margin-left: 10px;
    color: #0d6efd;
    font-family: 'Segoe UI', sans-serif;
  }

  .btn-call {
    background: #0d6efd;
    color: #fff;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 0 8px rgba(13, 110, 253, 0.3);
  }

  .btn-call:hover {
    background: #0b5ed7;
    transform: scale(1.05);
  }


  
    .btn-option {
      margin: 5px;
      transition: all 0.3s ease;
    }
    .btn-option:hover {
      transform: scale(1.08);
    }
    .btn-option.active {
      background-color: #0d6efd;
      color: #fff;
    }
    .fade-in {
      animation: fadeIn 0.4s ease-in;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  
</style>

</head>

<body>
  <!-- Fixed white header centered -->
  <div class="top-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="https://via.placeholder.com/50" alt="Logo" class="logo" />
      <span class="brand-name">Vk  Textiles</span>
    </div>
    <a href="tel:+1234567890" class="btn btn-call">
      <i class="fas fa-phone-alt me-2"></i>Call Now
    </a>
  </div>

  <!-- Hero section -->
  <header class="hero-header text-white text-center d-flex flex-column justify-content-center align-items-center">
  <div class="container py-5">
    <div id="productContainer" class="fade-in"></div>
  </div>
  </header>
</body>
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
      const defaultImage = product.image;
      const defaultPrice = product.type[0].price;

      container.innerHTML = `
        <div class="row">
          <div class="col-md-6">
            <img id="productImage" src="${defaultImage}" class="img-fluid rounded shadow-sm" alt="${product.name}">
          </div>
          <div class="col-md-6">
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <h4 id="priceDisplay" class="text-success mb-3">₹${defaultPrice}</h4>

            <div class="mb-3">
              <strong>Type:</strong><br>
              ${product.type.map(t => `<button class="btn btn-outline-primary btn-option type-btn" data-price="${t.price}">${t.label}</button>`).join('')}
            </div>

            <div class="mb-3">
              <strong>Size:</strong><br>
              ${product.sizes.map(s => `<button class="btn btn-outline-secondary btn-option size-btn">${s}</button>`).join('')}
            </div>

            <div class="mb-3">
              <strong>Color:</strong><br>
              ${product.colors.map(c => `<button class="btn btn-outline-dark btn-option color-btn" data-img="${c.image}">${c.name}</button>`).join('')}
            </div>
          </div>
        </div>
      `;

      document.querySelectorAll(".type-btn").forEach(btn => {
        btn.addEventListener("click", () => {
          document.getElementById("priceDisplay").textContent = "₹" + btn.dataset.price;
          setActive("type-btn", btn);
        });
      });

      document.querySelectorAll(".size-btn").forEach(btn => {
        btn.addEventListener("click", () => setActive("size-btn", btn));
      });

      document.querySelectorAll(".color-btn").forEach(btn => {
        btn.addEventListener("click", () => {
          const imgSrc = btn.getAttribute("data-img");
          document.getElementById("productImage").src = imgSrc;
          setActive("color-btn", btn);
        });
      });

      // Set defaults
      document.querySelector(".type-btn")?.classList.add("active");
      document.querySelector(".size-btn")?.classList.add("active");
      document.querySelector(".color-btn")?.classList.add("active");
    }

    function setActive(className, activeBtn) {
      document.querySelectorAll("." + className).forEach(btn => btn.classList.remove("active"));
      activeBtn.classList.add("active");
    }
  </script>

</html>
