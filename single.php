<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Navigation -->
<nav class="main-nav">
    <div class="nav-container">
        <div class="logo"><a href="<?php echo home_url(); ?>">NoritaDev</a></div>
        <ul class="nav-menu">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </div>
</nav>

<div class="single-post-wrapper">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    <article class="single-post">
        <header class="post-header">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <span class="post-date"><?php the_date(); ?></span>
                <span class="post-category"><?php the_category(', '); ?></span>
            </div>
            <?php if(has_post_thumbnail()) : ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <?php endif; ?>
        </header>
        
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </article>
    
    <?php endwhile; endif; ?>
</div>

<footer class="main-footer">
    <p>&copy; <?php echo date('Y'); ?> NoritaDev</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>