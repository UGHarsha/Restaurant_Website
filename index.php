<?php

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
    <title>Zesty Zoomer</title>
    <!-- Custom CSS (No Bootstrap) -->
  <link href="css/style.css?v=20260107" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
  </head>
  <body>
    <?php include 'user_header.php'; ?>

    <main class="landing">
      <section class="hero">
        <div class="hero-content">
          <span class="hero-kicker">Fresh & On Time</span>
          <h1>Comfort food, cooked to order, delivered fast.</h1>
          <p class="hero-sub">Simple ingredients, chef-finished flavors, and delivery windows you can count on. Order once or plan your whole week.</p>
          <div class="hero-actions">
            <a href="menu.php" class="btn hero-btn primary">Order now</a>
            <a href="category.php?category=dinner" class="btn hero-btn ghost">View dinner</a>
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
              <img src="images/dinner/d-8.jpg" alt="Featured dinner plate" onerror="this.src='images/about-img.jpg'">
              <div class="photo-badge">
                <span class="label">Tonight's pick</span>
                <strong>Garlic Butter Salmon</strong>
                <small>Charred lemon · herb jus</small>
              </div>
            </div>
            <div class="hero-slide">
              <img src="images/breakfast/b-c-4.jpg" alt="Breakfast spread" onerror="this.src='images/about-img.jpg'">
              <div class="photo-badge">
                <span class="label">Morning favorite</span>
                <strong>Buttery Stacks</strong>
                <small>Maple drizzle · fresh berries</small>
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
          <article class="collection-card" style="background-image: url('images/breakfast/b-c-4.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-sun-o"></i> Bright Morning</span>
                <span class="collection-badge"><i class="fa fa-clock-o"></i> 6–11 AM</span>
              </div>
              <h3>Breakfast</h3>
              <p>Sunrise bowls, buttery stacks, and fresh-pressed juices for a vibrant start.</p>
              <div class="collection-actions">
                <a href="category.php?category=breakfast" class="collection-link">Explore breakfast <span>&rarr;</span></a>
                <span class="collection-chip">12+ dishes</span>
              </div>
            </div>
          </article>

          <article class="collection-card" style="background-image: url('images/lunch/l-12.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-leaf"></i> Midday Flavor</span>
                <span class="collection-badge"><i class="fa fa-clock-o"></i> 11–3 PM</span>
              </div>
              <h3>Lunch</h3>
              <p>Seasonal salads, artisan sandwiches, and bowls that keep the day moving.</p>
              <div class="collection-actions">
                <a href="category.php?category=lunch" class="collection-link">See lunch dishes <span>&rarr;</span></a>
                <span class="collection-chip">15+ dishes</span>
              </div>
            </div>
          </article>

          <article class="collection-card" style="background-image: url('images/dinner/d-8.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-moon-o"></i> Evening Indulgence</span>
                <span class="collection-badge"><i class="fa fa-clock-o"></i> 5–11 PM</span>
              </div>
              <h3>Dinner</h3>
              <p>Chef-fired entrées, slow braises, and elegant plates for the perfect night in.</p>
              <div class="collection-actions">
                <a href="category.php?category=dinner" class="collection-link">Uncover dinner <span>&rarr;</span></a>
                <span class="collection-chip">20+ dishes</span>
              </div>
            </div>
          </article>

          <article class="collection-card" style="background-image: url('images/sides/s-5.jpg');">
            <div class="collection-content">
              <div class="collection-meta">
                <span class="collection-tag"><i class="fa fa-cutlery"></i> Shareable Bites</span>
                <span class="collection-badge"><i class="fa fa-users"></i> Crowd favorites</span>
              </div>
              <h3>Sides</h3>
              <p>Crisp greens, fire-roasted vegetables, and artisanal breads to round out the table.</p>
              <div class="collection-actions">
                <a href="category.php?category=sides" class="collection-link">Pair a side <span>&rarr;</span></a>
                <span class="collection-chip">12+ dishes</span>
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
                <a href="category.php?category=beverage" class="collection-link">Browse drinks <span>&rarr;</span></a>
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
            <li><a href="category.php?category=dinner">Chef’s Table</a></li>
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


