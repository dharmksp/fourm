
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/foundation.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<?php wp_head(); ?>
  <style>.nav-items {
  position: relative;
}
.submenu {
  list-style: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: white;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  padding: 0;
  display: none; /* Hide submenu initially */
}

.submenu li {
  padding: 10px;
  line-height: 20px;
}


.submenu li a {
  text-decoration: none;
  color: black;
  display: block;
}
.submenu li a:hover{
  background: black;
  color: #fff;
  padding: 10px 0 10px 0;
  
}
.nav-items:hover .submenu {
  display: block; /* Show submenu on hover */
}</style>
</head>

<body class="margin-0 padding-0">
    <div class="outer-wrapper w-full o-h">
        <div class="header-wrapper w-full p-fx z-6">
            <div class="header ">
			<?php

$logo_url = get_option('option_plugin_logo_url', get_template_directory_uri() . '/image/image 23.svg');
?>
              <div class="logo">
                <img src=<?php echo esc_url(get_theme_mod('header_logo', '')); ?> alt="" />
                <p class="logo-heading"><?php echo (get_theme_mod('logo_text', '')); ?></p>
              </div>
              <ul class="navbar">
                <li class="nav-items active">Home</li>
                <li class="nav-items">About</li>
                <li class="nav-items">Architecture
                      <ul class="submenu">
                        
                          <li><a href="http://localhost/fourm/project_category/offices/">Offices</a></li>
                          <li><a href="http://localhost/fourm/project_category/residential/">Residential</a></li>
                          <li><a href="http://localhost/fourm/project_category/institutional/">Institutional</a></li>
                      </ul></li>
                      
                            <li class="nav-items">Interiors
                            <ul class="submenu">
                            <li><a href="http://localhost/fourm/project_category/apartment/">Apartment</a></li>
                            <li><a href="http://localhost/fourm/project_category/office/">Office</a></li>
                          <li><a href="http://localhost/fourm/project_category/residential/">Residential</a></li>
                          <li><a href="http://localhost/fourm/project_category/institutional/">Institutional</a></li>
                      </ul></li>
               
                <li class="nav-items">Art</li>
                <li ><a class="nav-items" href="http://localhost/fourm/blog/">Blog</a></li>
                <li class="nav-items">With the Master</li>
                <li class="nav-items">Awards</li>
                <li class="nav-items">
                  <button class="primary-button box-shadow-none">Contact Us</button>
                </li>
              </ul>
              <div class="burgerMenu" id="burgerMenu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
              </div>
            </div>
            <nav class="menu p-fx">
              <button class="close-btn">&times;</button>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Architecture</a></li>
                <li><a href="#">Interiors</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Awards</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
        </div>