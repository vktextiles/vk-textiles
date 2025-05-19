<?php
include 'header.php';
?>
<div class="hero-header text-white text-center d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-4 fw-bold"><span class="highlight">Vk Textiles</span></h1>
    <p class="lead animate-subtext">Delivering quality fabrics with trust and tradition.</p>
  </div>
<div class="container py-5">
<center>
<center>
    <h2 class="kid_title wow fadeInLeft">

<span class="title_overlay_effect">
    PRODUCTS
</span>
</h2>

<!-- <p>Prime Textiles' infrastructure is a cornerstone of its success in the textile manufacturing industry. Here's a more detailed overview of the company's infrastructure:</p> -->
    </center>
</center>


  <!-- Filter Buttons -->
  <!-- <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="100">
    <button class="btn btn-secondary filter-btn active" onclick="filterProducts('All', this)">All</button>
    <button class="btn btn-outline-primary filter-btn" onclick="filterProducts('School', this)">School</button>
    <button class="btn btn-outline-success filter-btn" onclick="filterProducts('Hospital', this)">Hospital</button>
    <button class="btn btn-outline-dark filter-btn" onclick="filterProducts('Industrial', this)">Industrial</button>
  </div> -->

  <!-- Product Grid -->
  <div class="row" id="productGrid"></div>
</div>

<?php
include 'footer.php';
?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script>
  let products = [];

  fetch('uniforms.json')
    .then(res => res.json())
    .then(data => {
      products = data;
      renderProducts(data);
    });

  function renderProducts(data) {
    const grid = document.getElementById('productGrid');
    grid.innerHTML = '';

    data.forEach((product, index) => {
      grid.innerHTML += `
        <div class="col-6 col-md-4 col-lg-4 col-sm-6 col-xl-3 mb-4" data-aos="zoom-in" data-aos-delay="${index * 10}">
          <a href="product.php?id=${product.id}" class="text-decoration-none text-dark">
            <div class="card product-card h-100">
              <img src="${product.image}" class="card-img-top" alt="${product.name}">
              <div class="card-body">
                <h5 class="card-title">${product.name}</h5>
                <p class="card-text">₹${product.price}</p>
              </div>
            </div>
          </a>
        </div>
      `;
    });
  }

  function filterProducts(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    if (category === 'All') {
      renderProducts(products);
    } else {
      const filtered = products.filter(p => p.category === category);
      renderProducts(filtered);
    }
  }
</script>


