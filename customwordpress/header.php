<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
    
</head>

<body <?php body_class(); ?>>
    <!-- adding custom primary menu to header---->
    
    
    <div id="slideout-menu">
        <!-- <ul>
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('/blog');?>">Blog</a>
            </li>
            <li>
                <a href="<?php echo site_url('/project');?>">Projects</a>
            </li>
            <li>
                <a href="<?php echo site_url('/book');?>">Books</a>
            </li>
            <li>
                <a href="<?php echo site_url('/about');?>">About</a>
            </li>
            <li>
                <input type="text" placeholder="Search Here">
            </li>
        </ul> -->
    </div>

    <nav>
        <div id="logo-img">
            <a href="#">
                Custom Wordpress
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>

        <?php 
        /**
         * adding dynmic mnavigation menu 
         * registered register_nav_menu(); to functions.php
         */
    wp_nav_menu(array('theme_location'=>'primary'));
    // primary is the name of menu we provided in function.php
    ?>

        
    </nav>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    