<?php
/*
include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zesty Zoomer - Sri Lankan Cuisine Delivered</title>
    <!-- Custom CSS -->
    <link href="css/style.css?v=<?= time(); ?>" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <style>
      /* Sri Lankan Inspired Color Palette */
      :root {
        --saffron: #FF9933;
        --deep-orange: #FF6B35;
        --maroon: #8B0000;
        --forest-green: #228B22;
        --golden-yellow: #FFD700;
        --deep-red: #C41E3A;
        --cream: #FFF8DC;
        --dark-brown: #3E2723;
      }

      .sl-hero {
        background: linear-gradient(135deg, var(--deep-red) 0%, var(--maroon) 100%);
        padding: 80px 20px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
      }

      .sl-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.3;
      }

      .sl-hero-content {
        position: relative;
        z-index: 1;
        max-width: 900px;
        margin: 0 auto;
      }

      .sl-hero h1 {
        font-size: 3.5em;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-weight: 800;
      }

      .sl-hero p {
        font-size: 1.3em;
        margin-bottom: 30px;
        color: var(--cream);
      }

      .sl-hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
      }

      .sl-btn {
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
        transition: all 0.3s ease;
        display: inline-block;
      }

      .sl-btn-primary {
        background: var(--golden-yellow);
        color: var(--dark-brown);
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
      }

      .sl-btn-primary:hover {
        background: var(--saffron);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.6);
      }

      .sl-btn-secondary {
        background: transparent;
        border: 3px solid white;
        color: white;
      }

      .sl-btn-secondary:hover {
        background: white;
        color: var(--deep-red);
      }

      /* Categories Section */
      .sl-categories {
        padding: 60px 20px;
        background: var(--cream);
      }

      .sl-section-title {
        text-align: center;
        margin-bottom: 50px;
      }

      .sl-section-title h2 {
        font-size: 2.8em;
        color: var(--maroon);
        margin-bottom: 10px;
        font-weight: 800;
      }

      .sl-section-title p {
        font-size: 1.2em;
        color: #666;
      }

      .sl-category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
      }

      .sl-category-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
      }

      .sl-category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
      }

      .sl-category-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        position: relative;
      }

      .sl-category-content {
        padding: 25px;
        text-align: center;
      }

      .sl-category-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--golden-yellow);
        color: var(--dark-brown);
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 0.9em;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      }

      .sl-category-card:nth-child(1) .sl-category-badge { background: var(--deep-orange); color: white; }
      .sl-category-card:nth-child(2) .sl-category-badge { background: var(--forest-green); color: white; }
      .sl-category-card:nth-child(3) .sl-category-badge { background: var(--deep-red); color: white; }

      .sl-category-content h3 {
        font-size: 2em;
        color: var(--maroon);
        margin-bottom: 10px;
        font-weight: 700;
      }

      .sl-category-content p {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
      }

      .sl-category-link {
        display: inline-block;
        background: var(--deep-red);
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
      }

      .sl-category-link:hover {
        background: var(--maroon);
        transform: scale(1.05);
      }

      /* Latest Products Section */
      .sl-latest-products {
        padding: 60px 20px;
        background: white;
      }

      .sl-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
      }

      .sl-product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 3px solid transparent;
      }

      .sl-product-card:hover {
        border-color: var(--saffron);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 153, 51, 0.3);
      }

      .sl-product-img-container {
        position: relative;
        overflow: hidden;
        height: 220px;
        background: var(--cream);
      }

      .sl-product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
      }

      .sl-product-card:hover .sl-product-img {
        transform: scale(1.1);
      }

      .sl-product-category-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--deep-red);
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.85em;
        font-weight: bold;
        text-transform: capitalize;
      }

      .sl-product-actions {
        position: absolute;
        top: 15px;
        right: 15px;
        display: flex;
        gap: 10px;
      }

      .sl-product-action-btn {
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        color: var(--deep-red);
        font-size: 1.1em;
      }

      .sl-product-action-btn:hover {
        background: var(--deep-red);
        color: white;
        transform: scale(1.1);
      }

      .sl-product-info {
        padding: 20px;
      }

      .sl-product-name {
        font-size: 1.3em;
        color: var(--dark-brown);
        margin-bottom: 8px;
        font-weight: 700;
        min-height: 50px;
      }

      .sl-product-price {
        font-size: 1.5em;
        color: var(--deep-red);
        font-weight: bold;
        margin-bottom: 15px;
      }

      .sl-product-add-form {
        display: flex;
        gap: 10px;
        align-items: center;
      }

      .sl-qty-input {
        width: 60px;
        padding: 8px;
        border: 2px solid var(--saffron);
        border-radius: 8px;
        text-align: center;
        font-weight: bold;
      }

      .sl-add-to-cart-btn {
        flex: 1;
        background: var(--saffron);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .sl-add-to-cart-btn:hover {
        background: var(--deep-orange);
        transform: scale(1.05);
      }

      /* Features Section */
      .sl-features {
        padding: 60px 20px;
        background: linear-gradient(135deg, var(--forest-green) 0%, #1a6b1a 100%);
        color: white;
      }

      .sl-features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 40px auto 0;
      }

      .sl-feature-item {
        text-align: center;
        padding: 20px;
      }

      .sl-feature-icon {
        font-size: 3em;
        margin-bottom: 20px;
        color: var(--golden-yellow);
      }

      .sl-feature-item h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
      }

      @media (max-width: 768px) {
        .sl-hero h1 { font-size: 2.2em; }
        .sl-section-title h2 { font-size: 2em; }
        .sl-category-grid,
        .sl-products-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  <body>
    <?php include 'user_header.php'; ?>

    <main class="sl-main">
      <section class="hero">
        <div class="hero-content">
          <span class="hero-kicker">Fresh & On Time</span>
          <h1>Comfort food, cooked to order, delivered fast.</h1>
          <p class="hero-sub">Simple ingredients, chef-finished flavors, and delivery windows you can count on. Order once or plan your whole week.</p>
          <div class="hero-actions">
            <a href="menu.php" class="btn hero-btn primary">Order now</a>
            <a href="category.php?category=main" class="btn hero-btn ghost">View Menu</a>
          </div>
          <div class="hero-points">
            <div class="hero-point"><i class="fa fa-clock-o"></i><span>Under 30 mins</span></div>
            <div class="hero-point"><i class="fa fa-leaf"></i><span>Local produce</span></div>
            <div class="hero-point"><i class="fa fa-heart"></i><span>18k+ happy diners</span></div>
          </div>
        </div>
        <div class="hero-media">
          <div class="hero-carousel" id="hero-carousel">
            <div class="hero-slide active">
              <img src="images/dinner/d-8.jpg" alt="Featured main dish" onerror="this.src='images/about-img.jpg'">
              <div class="photo-badge">
                <span class="label">Tonight's pick</span>
                <strong>Garlic Butter Salmon</strong>
                <small>Charred lemon · herb jus</small>
              </div>
            </div>
            <div class="hero-slide">
              <img src="images/lunch/l-12.jpg" alt="Main course" onerror="this.src='images/about-img.jpg'">
              <div class="photo-badge">
                <span class="label">Chef's favorite</span>
                <strong>Artisan Sandwich</strong>
                <small>Fresh ingredients · handcrafted</small>
              </div>
            </div>
            <div class="hero-slide">
              <img src="images/beverages/b-3.jpg" alt="Craft beverage" onerror="this.src='images/about-img.jpg'">
              <div class="photo-badge">
                <span class="label">Sip & savour</span>
                <strong>Herbal Cooler</strong>
                <small>Citrus peel · garden mint</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="brand-pillars">
        <div class="section-header">
          <span class="section-eyebrow">Why ZestyZoomer</span>
          <h2>Culinary Craft, Delivered With Care</h2>
          <p>Every plate is carefully composed by our culinary studio, finished moments before dispatch, and sealed to preserve aroma, texture, and warmth.</p>
        </div>
        <div class="pillars-grid">
          <article class="pillar-card">
            <span class="pillar-icon"><i class="fa fa-leaf"></i></span>
            <h3>Seasonal & Local</h3>
            <p>We source peak-season produce, sustainable protein, and artisanal pantry staples from trusted partners.</p>
          </article>
          <article class="pillar-card">
            <span class="pillar-icon"><i class="fa fa-bolt"></i></span>
            <h3>Plated To Travel</h3>
            <p>Heat-retaining vessels, layered composition, and smart packaging keep every element crisp and vibrant.</p>
          </article>
          <article class="pillar-card">
            <span class="pillar-icon"><i class="fa fa-heart"></i></span>
            <h3>Hospitality First</h3>
            <p>Concierge support, effortless re-heating guides, and tailored recommendations make each order feel personal.</p>
          </article>
        </div>
      </section>

      <section class="signature-collection">
        <div class="section-header">
          <span class="section-eyebrow">Find Your Course</span>
          <h2>Browse By Category</h2>
          <p>Whether you crave a sunrise classic or a decadent nightcap, jump straight into the collection that fits the moment.</p>
        </div>
        <div class="collection-grid">
          <article class="collection-card" style="background-image: url('images/dinner/d-8.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-cutlery"></i> Delicious Dishes</span>
                <span class="collection-badge"><i class="fa fa-clock-o"></i> All Day</span>
              </div>
              <h3>Main</h3>
              <p>Chef-prepared entrées, flavorful meals, and signature dishes for any time of day.</p>
              <div class="collection-actions">
                <a href="category.php?category=main" class="collection-link">Explore main dishes <span>&rarr;</span></a>
                <span class="collection-chip">25+ dishes</span>
              </div>
            </div>
          </article>

          <article class="collection-card" style="background-image: url('images/desserts/d-6.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-star"></i> Sweet Finale</span>
                <span class="collection-badge"><i class="fa fa-birthday-cake"></i> Chef specials</span>
              </div>
              <h3>Desserts</h3>
              <p>Velvety cakes, brûléed custards, and chocolate showstoppers to finish with flair.</p>
              <div class="collection-actions">
                <a href="category.php?category=desserts" class="collection-link">Treat yourself <span>&rarr;</span></a>
                <span class="collection-chip">10+ treats</span>
              </div>
            </div>
          </article>

          <article class="collection-card" style="background-image: url('images/beverages/b-3.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-glass"></i> Sip & Savour</span>
                <span class="collection-badge"><i class="fa fa-snowflake-o"></i> Served chilled</span>
              </div>
              <h3>Beverages</h3>
              <p>Signature mixers, cold-pressed tonics, and crafted sips to complement any course.</p>
              <div class="collection-actions">
                <a href="category.php?category=beverages" class="collection-link">Browse drinks <span>&rarr;</span></a>
                <span class="collection-chip">18+ drinks</span>
              </div>
            </div>
          </article>
        </div>
      </section>

      <section class="chef-story">
        <div class="story-media">
          <img src="images/about-img.jpg" alt="Chef hand finishing a dish">
          <div class="story-badge">
            <span>crafted nightly</span>
            <strong>Small-batch production</strong>
          </div>
        </div>
        <div class="story-content">
          <span class="section-eyebrow">From Our Kitchen</span>
          <h2>Hand-Finished Plates From Culinary Directors</h2>
          <p>Our chefs design every element in-house—from spice blends to house-made reductions—so your table receives a cohesive dining story. Each menu evolves weekly to capture the rhythm of the seasons.</p>
          <ul class="story-points">
            <li><i class="fa fa-check"></i> Expertly seared, sauced, and garnished minutes before dispatch.</li>
            <li><i class="fa fa-check"></i> Detailed plating and heating notes accompany every course.</li>
            <li><i class="fa fa-check"></i> Private tasting menus and wine-paired experiences available on request.</li>
          </ul>
          <a href="contact us.php" class="btn link-inline">Plan a private tasting <span>&rarr;</span></a>
        </div>
      </section>

      <section class="customer-love">
        <div class="section-header">
          <span class="section-eyebrow">Guest Stories</span>
          <h2>The City’s Most Discerning Diners Love Us</h2>
        </div>
        <div class="testimonial-grid">
          <article class="testimonial-card">
            <div class="quote-mark">“</div>
            <p>“ZestyZoomer is the only service that plates each course with such attention. It arrives photo-ready and tastes even better.”</p>
            <div class="testimonial-footer">
              <h4>Amelia R.</h4>
              <span>Event curator · ★★★★★</span>
            </div>
          </article>
          <article class="testimonial-card">
            <div class="quote-mark">“</div>
            <p>“The flavors are complex and balanced. Each bite has texture, aroma, and chef-level finesse—without leaving home.”</p>
            <div class="testimonial-footer">
              <h4>Ravi S.</h4>
              <span>Food critic · ★★★★☆</span>
            </div>
          </article>
          <article class="testimonial-card">
            <div class="quote-mark">“</div>
            <p>“I host clients weekly and rely on ZestyZoomer to impress. Service, packaging, and taste are consistently exceptional.”</p>
            <div class="testimonial-footer">
              <h4>Louise K.</h4>
              <span>Creative director · ★★★★★</span>
            </div>
          </article>
        </div>
      </section>

      <section class="cta-band">
        <div class="cta-content">
          <div>
            <span class="section-eyebrow">Ready When You Are</span>
            <h2>Reserve Your Next Dining Moment</h2>
            <p>Create your own tasting lineup or let us curate a chef’s choice flight. Delivery schedules open daily from 4pm–10pm.</p>
          </div>
          <div class="cta-actions">
            <a href="orders.php" class="btn hero-btn primary">Schedule Delivery</a>
            <a href="contact us.php" class="btn hero-btn ghost">Concierge Chat</a>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="footer-columns">
        <div class="footer-brand">
          <div class="footer-logo"><span>Zesty</span><span>Zoomer</span></div>
          <p>Elevating home dining with chef-finished cuisine, seasonal pairings, and white-glove service delivered to your door.</p>
          <div class="footer-social">
            <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
        <div class="footer-links">
          <h3>Explore</h3>
          <ul>
            <li><a href="menu.php">Seasonal Menu</a></li>
            <li><a href="category.php?category=main">Main Dishes</a></li>
            <li><a href="blog.php">Journal</a></li>
            <li><a href="q and a.php">FAQ</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h3>Connect</h3>
          <ul>
            <li><a href="contact us.php">Contact Concierge</a></li>
            <li><a href="orders.php">Track Order</a></li>
            <li><a href="profile.php">My Account</a></li>
            <li><a href="login.php">Sign In</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h3>Visit Our Atelier</h3>
          <p>124 Artisan Avenue<br>Colombo 05</p>
          <p><a href="tel:+94778009658">+94 77 800 9658</a><br><a href="mailto:zestyzoomer@gmail.com">zestyzoomer@gmail.com</a></p>
          <span class="footer-hours">Service window: 4pm – 10pm daily</span>
        </div>
      </div>
      <div class="footer-bottom">
        <span>&copy; <?php echo date('Y'); ?> ZestyZoomer. All rights reserved.</span>
        <div class="footer-policies">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms</a>
        </div>
      </div>
    </footer>

    <script src="js/script.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const menuBar = document.getElementById('menu-bar');
        const navBar = document.querySelector('header .nav-bar');
        const dropdownParents = document.querySelectorAll('header .nav-bar ul li');

        if (menuBar && navBar) {
          menuBar.addEventListener('change', function() {
            navBar.style.display = this.checked ? 'block' : 'none';
            if (!this.checked) {
              navBar.querySelectorAll('ul ul').forEach(submenu => {
                submenu.style.display = 'none';
              });
            }
          });
        }

        if (navBar) {
          dropdownParents.forEach(parent => {
            const submenu = parent.querySelector('ul');
            if (!submenu) return;

            parent.addEventListener('click', function(evt) {
              if (window.innerWidth > 991) return;
              evt.stopPropagation();
              const isOpen = submenu.style.display === 'block';
              navBar.querySelectorAll('ul ul').forEach(list => {
                list.style.display = 'none';
              });
              submenu.style.display = isOpen ? 'none' : 'block';
            });
          });
        }

        document.addEventListener('click', function(evt) {
          if (window.innerWidth > 991) return;
          if (!evt.target.closest('header')) {
            document.querySelectorAll('header .nav-bar ul li ul').forEach(submenu => {
              submenu.style.display = 'none';
            });
            if (menuBar) {
              menuBar.checked = false;
              if (navBar) navBar.style.display = 'none';
            }
          }
        });

        // Hero carousel (autoplay, no controls)
        const carousel = document.getElementById('hero-carousel');
        if (carousel) {
          const slides = carousel.querySelectorAll('.hero-slide');
          if (slides.length > 1) {
            let current = 0;
            const showSlide = (idx) => {
              slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === idx);
              });
            };

            showSlide(current);

            setInterval(() => {
              current = (current + 1) % slides.length;
              showSlide(current);
            }, 4800);
          }
        }
      });
    </script>


*/