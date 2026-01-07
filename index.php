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
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
  </head>
  <body>
    <!-- Body code goes here -->

    <?php include 'user_header.php'; ?>

    <div class="carousel-1">
      <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block mx-auto img-fluid-1" src="images/s-2.jpg" alt="First slide">
            <div class="carousel-caption">
              <h1>Discover Gourmet Delights</h1>
              <p>"Relish gourmet meals at home. Fresh ingredients, luxurious flavors. Order now."</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block mx-auto img-fluid-1" src="images/s-3.jpg" alt="Second slide">
            <div class="carousel-caption">
              <h1>Fresh and Fast Delivery</h1>
              <p>"Get delicious meals delivered fast. Freshness in every bite. Order today and taste the difference."</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block mx-auto img-fluid-1" src="images/s-5.jpg" alt="Third slide">
            <div class="carousel-caption">
              <h1>Exclusive Online Offers</h1>
              <p>"Get special discounts and exclusive online deals. Enjoy delicious meals at unbeatable prices. Sign up now and save!"</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="container-fluid">
	  <div class="container"><h1 class="heading-f-d">Featured Dishes</h1>
	    <div class="row">
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-1.jpg" alt="Card image cap">
	          <div class="card-body">
			    <h5 class="card-title-1">Truffle Pasta</h5>
				 <p class="card-text">A luxurious pasta dish infused with aromatic truffle oil, topped with freshly shaved truffles and parmesan.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★☆</span>
            </div>
				   <a href="#" class="btn btn-primary">Order Now</a> 
              </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-2.jpg" alt="Card image cap">
	          <div class="card-body">
	            <h5 class="card-title-1">Grilled Salmon</h5>
				 <p class="card-text">Perfectly grilled salmon served with a side of roasted vegetables and a lemon butter sauce.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
				  <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-3.jpg" alt="Card image cap">
	          <div class="card-body">
	            <h5 class="card-title-1">Chocolate Lava Cake</h5>
				  <p class="card-text">A rich and decadent dessert with a molten chocolate center, served with vanilla ice cream.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
				  <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
	      </div>
        </div>
	  </div>
	   <div class="container">
	    <div class="row">
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-4.jpg" alt="Card image cap">
	          <div class="card-body">
	            <h5 class="card-title-1">Caesar Salad</h5>
				  <p class="card-text">Crisp romaine lettuce tossed with creamy Caesar dressing, croutons, and parmesan cheese.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★☆</span>
            </div>
				  <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-5.jpg" alt="Card image cap">
	          <div class="card-body">
	            <h5 class="card-title-1">Margherita Pizza</h5>
				  <p class="card-text">Classic Margherita pizza topped with fresh mozzarella, basil, and a drizzle of olive oil.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★☆</span>
            </div>
				  <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><img class="card-img-top img-fluid" src="images/dish-6.jpg" alt="Card image cap">
	          <div class="card-body">
				  <h5 class="card-title-1">Shrimp Tacos</h5>
				  <p class="card-text">Spicy shrimp tacos served with avocado, cilantro, and a zesty lime crema.</p>
				  <p class="price">$22.99</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
				  <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
	      </div>
        </div>
	  </div>
  </div>
 
	  <!-- about us ends--> 
	  <br>
	  <br>
	  <!-- menu starts-->

  <div class="container-fluid">
	  <div class="container"><h1 class="heading-m">Our Menu</h1>
	    <div class="row">
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><div align="center"><a href="category.php?category=breakfast"><!--<img class="card-img-top img-fluid" src="images/img-card-1.jpg" alt="Card image cap">-->
	
<svg width="100" height="105" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
    <title/>
    <g id="bread">
        <path d="M45,61a4,4,0,0,0,4-4V28.79a4.08,4.08,0,0,1,1.26-2.91A11,11,0,0,0,54,18C54,9.72,42.81,3,29,3S4,9.72,4,18a11,11,0,0,0,3.74,7.88A4.08,4.08,0,0,1,9,28.79V57a4,4,0,0,0,4,4Z" style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px"/>
        <path d="M45,61h6a4,4,0,0,0,4-4V28.79a4.08,4.08,0,0,1,1.26-2.91A11,11,0,0,0,60,18C60,9.72,48.81,3,35,3H28" style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="39" x2="40" y1="21" y2="21"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="22" x2="22" y1="32" y2="31"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="14" x2="15" y1="48" y2="48"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="32" x2="33" y1="40" y2="39"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="17" x2="16" y1="16" y2="15"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="43" x2="43" y1="52" y2="51"/>
        <line style="fill:none;stroke:#B5C18E;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px" x1="32" x2="33" y1="11" y2="10"/>
    </g>
</svg>

				</a></div>
	          <div class="card-body">
			    <h5 class="card-title"><a href="category.php?category=breakfast" class="m-link">Breakfast</a></h5>
	            <p class="card-text">Start your day with our hearty and delicious breakfast options.</p>
	            <a href="category.php?category=breakfast" class="btn btn-primary">Breakfast</a> </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><a href="category.php?category=lunch"> <!--<img class="card-img-top img-fluid" src="images/img-card-2.jpg" alt="Card image cap">-->
				<div align="center">
					
<svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="110" height="110">
    <title/>
    <path d="M256,116c-77.19,0-140,62.79-140,140s62.79,140,140,140,140-62.81,140-140S333.19,116,256,116Zm0,268.45c-70.83,0-128.45-57.63-128.45-128.47a128.45,128.45,0,0,1,256.9,0C384.45,326.83,326.83,384.46,256,384.46Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="2"/>
    <path d="M256,160.3A95.7,95.7,0,1,0,351.7,256,95.8,95.8,0,0,0,256,160.3Zm0,179.87A84.17,84.17,0,1,1,340.17,256,84.27,84.27,0,0,1,256,340.17Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="2"/>
    <path d="M501.84,134.31c0-35.39-24-64.19-53.42-64.19S395,98.92,395,134.31c0,33,20.93,60,47.64,63.5v22.74a29.93,29.93,0,0,0-24.13,29.32V412a29.9,29.9,0,1,0,59.79,0V249.87a29.93,29.93,0,0,0-24.13-29.32V197.82C480.9,194.31,501.84,167.34,501.84,134.31Zm-95.3,0c0-29,18.78-52.66,41.88-52.66s41.89,23.62,41.89,52.66S471.51,187,448.42,187,406.54,163.35,406.54,134.31Zm60.24,115.56V412a18.37,18.37,0,1,1-36.73,0V249.87a18.37,18.37,0,1,1,36.73,0Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="2"/>
    <path d="M95,70.12a5.78,5.78,0,0,0-5.77,5.77v57.24A22.69,22.69,0,0,1,66.62,155.8H61.26V75.89a5.77,5.77,0,1,0-11.53,0V155.8H44.37a22.7,22.7,0,0,1-22.68-22.67V75.89a5.77,5.77,0,1,0-11.53,0v57.24a34.25,34.25,0,0,0,34.21,34.2h5.36v53.22A29.92,29.92,0,0,0,25.6,249.87V412a29.9,29.9,0,1,0,59.79,0V249.87a29.93,29.93,0,0,0-24.13-29.32V167.33h5.36a34.23,34.23,0,0,0,34.19-34.2V75.89A5.78,5.78,0,0,0,95,70.12ZM73.85,249.87V412a18.36,18.36,0,1,1-36.72,0V249.87a18.36,18.36,0,1,1,36.72,0Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="2"/>
</svg>

</div>

				</a>
	          <div class="card-body">
	            <h5 class="card-title"><a href="category.php?category=lunch" class="m-link">Lunch</a></h5>
	            <p class="card-text">Savor our delightful lunch specials, perfect for a midday treat.</p>
	            <a href="category.php?category=lunch"  class="btn btn-primary">Lunch</a> </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><a href="category.php?category=dinner"> <!--<img class="card-img-top img-fluid" src="images/img-card-3.jpg" alt="Card image cap">-->
				<div align="center">
				
		<svg id="Outline" style="enable-background:new 0 0 64 64;" width="120" height="120" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    	<title/>
    <desc/>
    <g fill="#B5C18E" stroke="#B5C18E" stroke-width="0.05">
        <path d="M17.171,26.687l-1.414-1.414c-0.603,0.602-1.14,1.267-1.597,1.976l1.68,1.085C16.221,27.743,16.669,27.189,17.171,26.687z"/>
        <path d="M15.017,37.615c-0.988-2.373-1.02-5.108-0.085-7.505l-1.863-0.727c-1.121,2.874-1.083,6.155,0.103,9.001L15.017,37.615z"/>
        <path d="M35.433,42.78l-0.865,1.803c1.622,0.779,3.368,1.174,5.19,1.174c1.606,0,3.164-0.31,4.628-0.922l-0.771-1.846C41.014,44.077,37.976,44.001,35.433,42.78z"/>
        <path d="M32.15,40.293l-1.414,1.414l0.535,0.535c0.348,0.348,0.722,0.679,1.112,0.985l1.232-1.575c-0.326-0.255-0.64-0.533-0.931-0.824L32.15,40.293z"/>
        <path d="M31.293,21.707C31.488,21.902,31.744,22,32,22s0.512-0.098,0.707-0.293l6-6c0.99-0.99,1.536-2.307,1.536-3.707s-0.546-2.717-1.536-3.707C36.885,6.471,34.044,6.275,32,7.7c-2.043-1.426-4.885-1.23-6.707,0.593c-0.99,0.99-1.536,2.307-1.536,3.707s0.546,2.717,1.536,3.707L31.293,21.707z M26.707,9.707C27.339,9.075,28.17,8.759,29,8.759s1.661,0.316,2.293,0.948c0.391,0.391,1.023,0.391,1.414,0c1.264-1.264,3.322-1.264,4.586,0c0.612,0.613,0.95,1.427,0.95,2.293s-0.338,1.68-0.95,2.293L32,19.586l-5.293-5.293c-0.612-0.613-0.95-1.427-0.95-2.293S26.095,10.32,26.707,9.707z"/>
        <path d="M61.836,44.569c-0.228-0.392-0.691-0.582-1.128-0.463l-7.218,1.969l-7.417-7.417c2.436-3.135,2.221-7.678-0.658-10.557l-7.778-7.778c-0.391-0.391-1.023-0.391-1.414,0L32,24.544l-4.221-4.222c-0.188-0.188-0.441-0.293-0.707-0.293s-0.52,0.105-0.707,0.293l-7.778,7.778c-2.879,2.88-3.094,7.422-0.658,10.557l-7.417,7.417l-7.218-1.969c-0.437-0.119-0.9,0.07-1.128,0.463c-0.228,0.392-0.162,0.889,0.158,1.209l9.899,9.899c0.32,0.32,0.817,0.386,1.209,0.158c0.392-0.228,0.582-0.691,0.463-1.128l-1.969-7.218l7.417-7.417c1.397,1.089,3.102,1.685,4.901,1.685c2.137,0,4.146-0.832,5.656-2.343L32,37.313l2.101,2.101c1.511,1.511,3.52,2.343,5.657,2.343c1.799,0,3.504-0.596,4.901-1.685l7.417,7.417l-1.969,7.218c-0.119,0.438,0.07,0.9,0.463,1.128c0.392,0.228,0.889,0.162,1.209-0.158l9.899-9.899C61.998,45.458,62.063,44.961,61.836,44.569z M36.929,22.443l6.364,6.364l-1.435,1.435c-2.078,2.078-4.841,3.222-7.778,3.222h-3.101l-2.536-2.536L36.929,22.443z M27.071,22.443l3.514,3.515l-4.263,4.263c-0.391,0.391-0.391,1.023,0,1.414l1.649,1.649c-2.195-0.391-4.219-1.432-5.83-3.042l-1.435-1.435L27.071,22.443z M6.399,47.026l3.594,0.98l0.98,3.594L6.399,47.026z M28.485,38c-1.133,1.133-2.64,1.757-4.242,1.757c-1.604,0-3.11-0.624-4.243-1.757c-2.097-2.097-2.298-5.365-0.635-7.707l1.363,1.363c2.456,2.456,5.721,3.808,9.192,3.808h0.231l0.435,0.435L28.485,38z M35.515,38l-2.536-2.536h1.101c3.472,0,6.736-1.352,9.192-3.808l1.363-1.363C46.298,32.635,46.097,35.903,44,38c-1.133,1.133-2.64,1.757-4.242,1.757C38.154,39.757,36.647,39.133,35.515,38z M53.026,51.601l0.98-3.594l3.594-0.98L53.026,51.601z"/>
    </g>
</svg>

</div>
				</a>
	          <div class="card-body">
	            <h5 class="card-title"><a href="category.php?category=dinner" class="m-link">Dinner</a></h5>
	            <p class="card-text">End your day with a delectable dinner from our exclusive menu.</p>
	            <a href="category.php?category=dinner" class="btn btn-primary">Dinner</a> </div>
            </div>
	      </div>
        </div>
	  </div>
	   <div class="container">
	    <div class="row">
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><a href="category.php?category=sides"><!-- <img class="card-img-top img-fluid" src="images/img-card-4.jpg" alt="Card image cap">-->
				<div align="center">
				
<svg enable-background="new 0 0 50 50" height="100px" version="1.1" viewBox="0 0 50 50" width="102px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <g id="Layer_10">
    <path clip-rule="evenodd" d="M11.007,14.487c1.966-1.414,4.592-1.88,6.922-1.22   
    c-2.441,2.414-3.676,5.868-3.676,9.27h2.51c0-2.677,0.893-5.099,2.329-6.842c2.968-3.6,7.693-3.601,10.661,0   
    c1.436,1.743,2.329,4.165,2.329,6.842h2.509c0-3.286-1.147-6.607-3.423-9.012c2.445-1.037,5.393-0.681,7.594,0.774   
    c2.346,1.554,3.428,4.034,2.789,6.87l-4.342,19.236c-0.513,2.275-1.533,4.06-2.822,5.22c-2.784,2.506-5.993,1.628-8.309-0.945   
    l-2.117,0.011c-2.293,2.584-5.521,3.496-8.318,1.016c-1.303-1.156-2.336-2.951-2.855-5.253L8.45,21.218   
    C7.846,18.542,8.793,16.076,11.007,14.487 M26.587,2.844c-1.463,2.166-1.302,4.904-0.891,7.722   
    c-0.836-0.125-1.694-0.126-2.53-0.002c0.473-2.6,1.164-5.19,3.151-7.72H26.587z M40.327,11.933   
    c-3.427-2.267-8.066-2.506-11.6-0.323c-0.586-3.643-1.153-7.292,2.488-8.889L30.649,0H25.65l-1.077,0.5   
    c-3.08,3.589-3.791,7.088-4.375,10.583c-3.498-1.601-7.734-1.13-10.846,1.105c-3.153,2.265-4.526,5.842-3.668,9.654l4.34,19.236   
    c0.654,2.904,2.01,5.215,3.743,6.753c3.467,3.075,7.906,2.77,11.261-0.204c3.373,2.942,7.82,3.203,11.259,0.11   
    c1.705-1.535,3.039-3.831,3.688-6.708l4.342-19.236C45.215,17.812,43.645,14.126,40.327,11.933z" fill="#B5C18E" stroke="#B5C18E" stroke-width="0.05"/>
  </g>
</svg>

				</div>
				</a>
	          <div class="card-body">
	            <h5 class="card-title"><a href="category.php?category=sides" class="m-link">Sides</a></h5>
	            <p class="card-text">Complement your meal with our tasty and diverse side dishes.</p>
	            <a href="category.php?category=sides" class="btn btn-primary">Sides</a> </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><a href="category.php?category=desserts"> <!--<img class="card-img-top img-fluid" src="images/img-card-5.jpg" alt="Card image cap">-->
				<div align="center">
			
<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" height="100px" width="100px">
  <title/>
  <g data-name="Layer 14" id="Layer_14">
    <path d="M41,8a.988.988,0,0,0-.482.124l-40,22a.968.968,0,0,0-.147.115,1.118,1.118,0,0,0-.093.074,1,1,0,0,0-.2.294c-.005.012-.005.026-.01.039a1.011,1.011,0,0,0-.064.318c0,.013-.007.023-.007.036V55a1,1,0,0,0,1,1H63a1,1,0,0,0,1-1V31A23.026,23.026,0,0,0,41,8Zm.254,2A21.028,21.028,0,0,1,61.977,30H59.766a11.112,11.112,0,0,0-5.442-6.651,11.293,11.293,0,0,0-11.069-8.857c-.318,0-.644.016-.984.049l-.011-.022a9.569,9.569,0,0,0-2.58-3.652Zm10.79,16.7-1.466-.694-.239-1.554a7.151,7.151,0,0,0-7.084-5.963,7.97,7.97,0,0,0-1.083.091l-2.282.335-1.005-2a7.283,7.283,0,0,0-3.837-3.329l2.942-1.471c1.224.722,1.759,1.815,2.473,3.274l.333.674a1,1,0,0,0,1.047.539,9.125,9.125,0,0,1,1.412-.118,9.257,9.257,0,0,1,9.185,7.676,1,1,0,0,0,.56.752A9.171,9.171,0,0,1,57.678,30H55.41A7.029,7.029,0,0,0,52.044,26.705ZM32.148,15.01A5.839,5.839,0,0,1,37.1,17.822l1.328,2.642a1,1,0,0,0,1.039.54l2.984-.439a6.164,6.164,0,0,1,.8-.071,5.138,5.138,0,0,1,5.107,4.265l.32,2.081a1,1,0,0,0,.56.752l1.947.921A5.137,5.137,0,0,1,53.038,30H4.894ZM2,44H58v2H2Zm56-2H2V36H58ZM2,54V48H58v6Zm60,0H60V35a1,1,0,0,0-1-1H2V32H62Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="0.05"/>
    <path d="M36,20.142V18a1,1,0,0,0-2,0v2.142a4,4,0,1,0,2,0ZM35,26a1.994,1.994,0,0,1-1-3.722V23a1,1,0,0,0,2,0v-.722A1.994,1.994,0,0,1,35,26Z" fill="#B5C18E" stroke="#B5C18E" stroke-width="0.05"/>
  </g>
</svg>
</div>
				</a>
	          <div class="card-body">
	            <h5 class="card-title"><a href="category.php?category=desserts" class="m-link">Desserts</a></h5>
	            <p class="card-text">Indulge in our heavenly desserts, the perfect end to any meal.</p>
	            <a href="category.php?category=desserts" class="btn btn-primary">Desserts</a> </div>
            </div>
	      </div>
	      <div class="col-lg-4">
	        <div class="card col-md-4 col-lg-12"><a href="category.php?category=beverage"> <!--<img class="card-img-top img-fluid" src="images/img-card-6.jpg" alt="Card image cap">-->
				<div align="center">
			
		<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" width="110px" height="110px">
			  <title/>
			  <polygon points="44 59 20 59 17 13 47 13 44 59" fill="none" stroke="#B5C18E" stroke-linejoin="round" stroke-width="1.8"/>
			  <circle cx="17" cy="15" r="10" fill="none" stroke="#B5C18E" stroke-linejoin="round" stroke-width="1.8"/>
			  <line x1="19" x2="45" y1="36" y2="36" fill="none" stroke="#B5C18E" stroke-linejoin="round" stroke-width="1.8"/>
			  <polyline points="30 51 42 8 54 3" fill="none" stroke="#B5C18E" stroke-linejoin="round" stroke-width="1.8"/>
			</svg>
			</div>
				</a>
	          <div class="card-body">
				  <h5 class="card-title"><a href="category.php?category=beverage" class="m-link">Beverages</a></h5>
	            <p class="card-text">Quench your thirst with our wide range of refreshing beverages.</p>
	            <a href="category.php?category=beverage" class="btn btn-primary">Beverages</a> </div>
            </div>
	      </div>
        </div>
	  </div>
  </div>
<!-- menu ends-->
<div class="container-fluid">
	    <div class="container">
		  <div class="card-heading2"><h1><b>About Us</b></h1></div>
		  <div class="row">
		    <div class="col-lg-6">
		      <img src="images/about-img.jpg" class="img-fluid-1 img img-fluid rounded">
		    </div>
		    <div class="col-lg-6">
		      <p align="justify">Welcome to ZestyZoomer, your ultimate online destination for gourmet dining. Our mission is to bring the finest culinary experiences right to your doorstep. We pride ourselves on using the freshest ingredients to create dishes that delight your taste buds and warm your heart.</p>
    <p align="justify">At ZestyZoomer, we are passionate about food and dedicated to excellence. Our journey began with a simple idea: to make gourmet dining accessible to everyone, regardless of location. With a team of talented chefs and food enthusiasts, we have crafted a menu that combines traditional flavors with innovative techniques.</p>
    <p align="justify">Each dish is meticulously prepared to ensure the highest quality and taste. From succulent entrees to decadent desserts, every item on our menu is a testament to our commitment to culinary perfection. We source our ingredients from local farmers and trusted suppliers, ensuring that every bite is fresh and flavorful.</p>
    <p align="justify">We understand the importance of convenience in today's fast-paced world. That's why we offer a seamless online ordering experience, allowing you to enjoy our exquisite dishes from the comfort of your home. Whether you're hosting a special occasion or simply craving a delicious meal, ZestyZoomer is here to make your dining experience memorable.</p>
    <p align="justify">Join our community of food lovers and embark on a culinary journey with ZestyZoomer. We are honored to serve you and look forward to delighting you with our gourmet creations. Thank you for choosing ZestyZoomer – where every meal is a celebration!</p>
	<a href="about us.html" class="btn btn-primary">Read More</a>
		    </div>
	      </div>
        </div>
      </div>


<br>

 <div class="testimonials">
       <h2 class="customer">Customer Reviews</h2>
        <div class="testimonials-container">
            <div class="testimonials-wrapper">
                <div class="testimonial">
                    <img src="images/c-1.jpg" alt="Customer 1" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>John Doe</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"ZestyZoomer exceeded my expectations! The food was fresh, delicious, and arrived quickly. I highly recommend it to anyone looking for a gourmet dining experience at home."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-2.jpg" alt="Customer 2" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Jane Smith</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"The quality of the food is fantastic, and the service is top-notch. I love the convenience of ordering online and having a restaurant-quality meal delivered to my door."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-3.jpg" alt="Customer 3" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Michael Brown</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"ZestyZoomer is my go-to for special occasions. The dishes are always beautifully presented and incredibly tasty. I appreciate the attention to detail and the exceptional customer service."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-4.jpg" alt="Customer 4" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Emily Johnson</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"I was pleasantly surprised by the variety and quality of the menu. Every dish I've tried has been amazing. ZestyZoomer makes it easy to enjoy a gourmet meal without leaving home."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-5.jpg" alt="Customer 5" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Chris Lee</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"The meals are consistently delicious and the service is excellent. I love ordering from ZestyZoomer for a hassle-free gourmet experience at home."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-6.jpg" alt="Customer 6" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Linda White</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"The food is always fresh and tasty, and the delivery is prompt. ZestyZoomer is my top choice for a convenient and delicious meal."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-7.jpg" alt="Customer 7" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Robert Green</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"I am thoroughly impressed with ZestyZoomer's quality and service. The meals are exceptional, and the convenience of online ordering is unbeatable."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-8.jpg" alt="Customer 8" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Sarah Brown</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"Every meal I've ordered from ZestyZoomer has been a delight. The flavors are incredible, and the service is always reliable."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-9.jpg" alt="Customer 9" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Paul Davis</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"From appetizers to desserts, every dish is a masterpiece. ZestyZoomer offers a fine dining experience without leaving the comfort of home."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-10.jpg" alt="Customer 10" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Laura Wilson</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"The customer service is exceptional and the meals are divine. ZestyZoomer is my top choice for any special occasion."</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-11.jpg" alt="Customer 11" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>James Miller</h3>
                        <div class="rating">
                            <span>★★★★★</span>
                        </div>
                        <p align="justify">"I've tried many meal delivery services, but ZestyZoomer stands out for its quality and attention to detail. Highly recommended!"</p>
                    </div>
                </div>
                <div class="testimonial">
                    <img src="images/c-12.jpg" alt="Customer 12" class="customer-photo img-fluid">
                    <div class="testimonial-info">
                        <h3>Olivia Taylor</h3>
                        <div class="rating">
                            <span>★★★★☆</span>
                        </div>
                        <p align="justify">"The flavors and presentation of the meals are always impressive. ZestyZoomer makes gourmet dining accessible and convenient."</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      

  <!--footer starts-->
<footer>
	<div class="container-f">
	<div class="row">
	<div class="col-lg-4 col-md-6 square"><div class="logo-f"><span class="logo-1-f">Zesty</span><span class="logo-2-f">Zoomer</span></div>
		<br><p class="about" align="justify">ZestyZoomer provides quick, delectable, fresh meal delivery. Savor our extensive menu, which is freshly prepared at your door using premium ingredients. ZestyZoomer offers easy dining experiences!</p></div>
	<div class="col-lg-2 col-md-6 square">
	<div class="heading-f">Menu</div>
		<ul class="f-list">
			<br>
		<li><a href="breakfast.html">Breakfast</a></li>
			<li><a href="lunch.html">Lunch</a></li>
			<li><a href="dinner.html">Dinner</a></li>
			<li><a href="sides.html">Sides</a></li>
			<li><a href="desserts.html">Desserts</a></li>
			<li><a href="beverages.html">Beverages</a></li>
		</ul>
	</div>
	<div class="col-lg-2 col-md-6 square">
	<div class="heading-f-l">Links</div>
		<ul class="l-list">
			<br>
		<li><a href="index.html">Home</a></li>
			<li><a href="about us.html">About Us</a></li>
			<li><a href="blog.html">Blog</a></li>
			<li><a href="contact us.html">Contact Us</a></li>
		</ul>
	</div>
	<div class="col-lg-4 col-md-6 square">
		<div class="heading-f-c">Contact</div>
		<ul class="contact">
			<br>
		<li><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;+94 77 800 9658</li>
			<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;zestyzoomer@gmail.com</a></li>
		</ul>
	</div>
	</div>
		<ul class="social-media">
			<br>
			<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		</ul>
	</div>
	
</footer>
<div class="copy">&copy; copyright &amp; Reserved 2024.</div>
	  <!--footer ends-->
	  
	  
	  
	  
	  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/script.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
	  <script>
      $(document).ready(function () {
          // Handle dropdown menu toggle
          $('header .nav-bar ul li:has(ul)').click(function (e) {
              if ($(window).width() <= 991) {
                  e.stopPropagation();
                  $(this).find('ul').toggle();
              }
          });

          // Close the dropdown if clicked outside
          $(document).click(function (e) {
              if ($(window).width() <= 991) {
                  if (!$(e.target).closest('header').length) {
                      $('header .nav-bar ul li ul').hide();
                  }
              }
          });

          // Handle the menu-bar checkbox for toggling the nav bar
          $('#menu-bar').change(function () {
              if ($(this).is(':checked')) {
                  $('header .nav-bar').show();
              } else {
                  $('header .nav-bar').hide();
                  $('header .nav-bar ul li ul').hide();
              }
          });
      });
    </script>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  
