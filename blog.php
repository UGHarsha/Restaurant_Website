<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog - ZestyZoomer</title>
	<link rel="icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">
	<link href="css/home-style.css" rel="stylesheet">
	<link href="css/pages-style.css" rel="stylesheet">
	<link href="css/blog.css" rel="stylesheet">
</head>
<body>
	<?php include 'user_header.php'; ?>

	<!-- Page Hero -->
	<section class="blog-hero">
		<div class="container">
			<h1 class="blog-hero__title">Global Flavors & Kitchen Stories</h1>
			<p class="blog-hero__subtitle">Discover recipes, traditions, and cooking tips from around the world. Fresh ideas, authentic techniques, and Sri Lankan favorites.</p>
			
		</div>
	</section>

	<!-- Filters removed by request -->

	<!-- Posts Grid -->
	<section class="blog-section container">
		<h2 class="section-heading text-center">Global Flavors: Unique Recipes from Around the World</h2>
		<div id="blogGrid" class="blog-grid">
			<!-- Shakshuka -->
			<article class="post-card" data-title="shakshuka eggs stew" data-tags="middle-east vegetarian" data-keywords="eggs tomatoes skillet cumin paprika bell pepper">
				<div class="post-media">
					<img src="images/b-1.jpg" alt="Shakshuka in skillet">
				</div>
				<div class="post-body">
					<h3 class="post-title">Shakshuka</h3>
					<div class="post-meta"><span class="meta-pill">Middle East</span><span class="meta-pill">Vegetarian</span></div>
					<p class="post-excerpt">Eggs gently poached in a spiced tomato and bell pepper sauce—perfect with crusty bread.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>2 tbsp olive oil</li>
							<li>1 onion (finely chopped), 2 garlic cloves (minced)</li>
							<li>1 red + 1 yellow bell pepper (chopped)</li>
							<li>1 tsp cumin, 1 tsp smoked paprika, 1/2 tsp chili flakes</li>
							<li>1 can (400g) diced tomatoes</li>
							<li>Salt, pepper, 4–6 large eggs, parsley/cilantro</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Sauté onion in oil, add garlic and peppers with spices; cook 5–7 mins.</li>
							<li>Add tomatoes; simmer 10–15 mins to thicken. Season.</li>
							<li>Make wells, crack in eggs, cover and cook to preference.</li>
							<li>Garnish with herbs and serve with bread.</li>
						</ol>
					</details>
				</div>
			</article>

			<!-- Bibimbap -->
			<article class="post-card" data-title="korean bibimbap rice bowl" data-tags="korea" data-keywords="rice vegetables gochujang sesame egg beef tofu">
				<div class="post-media">
					<img src="images/b-2.jpg" alt="Korean Bibimbap bowl">
				</div>
				<div class="post-body">
					<h3 class="post-title">Korean Bibimbap</h3>
					<div class="post-meta"><span class="meta-pill">Korea</span></div>
					<p class="post-excerpt">Colorful rice bowl topped with crisp veggies, egg, and gochujang for a spicy kick.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>Cooked rice</li>
							<li>Carrot, zucchini, spinach, shiitake, bean sprouts</li>
							<li>4 eggs, sesame oil, soy sauce, gochujang, sesame seeds</li>
							<li>Optional: sliced beef or tofu</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Stir-fry each veg with a splash of soy; keep crisp.</li>
							<li>Fry eggs. Arrange over rice with protein.</li>
							<li>Add gochujang, sesame oil; sprinkle sesame seeds and mix.</li>
						</ol>
					</details>
				</div>
			</article>

			<!-- Moroccan Tagine -->
			<article class="post-card" data-title="moroccan tagine chickpeas sweet potato" data-tags="morocco vegetarian" data-keywords="cumin coriander cinnamon turmeric ginger apricot stew">
				<div class="post-media">
					<img src="images/b-3.jpg" alt="Moroccan Tagine">
				</div>
				<div class="post-body">
					<h3 class="post-title">Moroccan Tagine</h3>
					<div class="post-meta"><span class="meta-pill">Morocco</span><span class="meta-pill">Vegetarian</span></div>
					<p class="post-excerpt">A warming, fragrant stew with chickpeas, sweet potato, and dried apricots.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>Olive oil, onion, garlic</li>
							<li>Spices: cumin, coriander, cinnamon, turmeric, ginger, cayenne</li>
							<li>Chickpeas, diced tomatoes, vegetable broth</li>
							<li>Sweet potato (cubed), dried apricots, salt & pepper</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Sauté onion; add garlic and spices.</li>
							<li>Add chickpeas, tomatoes, broth, sweet potato, apricots; simmer 20–25 mins.</li>
							<li>Season, garnish with cilantro; serve with couscous or bread.</li>
						</ol>
					</details>
				</div>
			</article>

			<!-- Vietnamese Pho -->
			<article class="post-card" data-title="vietnamese pho beef noodle soup" data-tags="vietnam" data-keywords="broth star anise ginger rice noodles herbs lime">
				<div class="post-media">
					<img src="images/b-4.jpg" alt="Vietnamese Pho bowl">
				</div>
				<div class="post-body">
					<h3 class="post-title">Vietnamese Pho</h3>
					<div class="post-meta"><span class="meta-pill">Vietnam</span></div>
					<p class="post-excerpt">A clear, aromatic broth over rice noodles with thinly-sliced beef and fresh herbs.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>Onion, ginger (charred), star anise, cloves, cinnamon, coriander & fennel seeds</li>
							<li>Beef or veg broth; rice noodles; beef/chicken/tofu</li>
							<li>Bean sprouts, Thai basil, cilantro, mint; lime; sauces</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Simmer spices with broth ~1 hour; strain.</li>
							<li>Cook noodles; slice protein. Ladle hot broth over and serve with herbs.</li>
						</ol>
					</details>
				</div>
			</article>

			<!-- Argentine Empanadas -->
			<article class="post-card" data-title="argentine empanadas" data-tags="argentina" data-keywords="dough beef olives egg pastry">
				<div class="post-media">
					<img src="images/b-5.jpg" alt="Argentine Empanadas">
				</div>
				<div class="post-body">
					<h3 class="post-title">Argentine Empanadas</h3>
					<div class="post-meta"><span class="meta-pill">Argentina</span></div>
					<p class="post-excerpt">Golden, flaky hand pies with a savory beef filling—great for sharing.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>Dough: flour, salt, cold butter, cold water</li>
							<li>Filling: onion, garlic, ground beef, cumin, paprika, salt & pepper</li>
							<li>Add-ins: chopped egg, green olives, raisins (opt.)</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Make dough; chill 30 mins. Cook filling; cool.</li>
							<li>Roll, cut rounds, fill, fold and crimp. Brush with egg wash.</li>
							<li>Bake 190°C (375°F) for 20–25 mins until golden.</li>
						</ol>
					</details>
				</div>
			</article>

			<!-- Japanese Ramen -->
			<article class="post-card" data-title="japanese ramen noodle soup" data-tags="japan" data-keywords="broth miso soy egg nori bamboo shoots">
				<div class="post-media">
					<img src="images/b-6.jpg" alt="Japanese Ramen bowl">
				</div>
				<div class="post-body">
					<h3 class="post-title">Japanese Ramen</h3>
					<div class="post-meta"><span class="meta-pill">Japan</span></div>
					<p class="post-excerpt">Comforting noodle soup with layered umami flavors and classic toppings.</p>
					<details class="post-details">
						<summary class="btn btn-light-brand">View recipe</summary>
						<h4>Ingredients</h4>
						<ul>
							<li>Broth: stock, garlic, ginger, soy, miso (opt.)</li>
							<li>Noodles; chicken/pork/tofu; soft-boiled eggs</li>
							<li>Green onions, nori, bamboo shoots, corn (opt.)</li>
						</ul>
						<h4>Instructions</h4>
						<ol>
							<li>Simmer broth 15–20 mins; season and strain.</li>
							<li>Cook noodles; add protein and toppings; pour hot broth to serve.</li>
						</ol>
					</details>
				</div>
			</article>
		</div>

		<!-- Pagination removed by request -->
	</section>

	<?php include 'user_footer.php'; ?>
	<!-- blog.js removed by request -->
</body>
</html>
</html>