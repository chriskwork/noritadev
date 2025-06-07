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
        <div class="logo">NoritaDev</div>
        <ul class="nav-menu">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </div>
</nav>

<div class="main-wrapper">
    <div class="content-area">
        <!-- Hero Section with Latest Post -->
        <section class="hero">
            <?php
            $latest_post = new WP_Query(array(
                'posts_per_page' => 1
            ));
            if($latest_post->have_posts()) :
                while($latest_post->have_posts()) : $latest_post->the_post();
            ?>
            <div class="hero-post">
                <?php if(has_post_thumbnail()) : ?>
                <div class="hero-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                </div>
                <?php endif; ?>
                <div class="hero-content">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                    <div class="post-meta">
                        <span><?php the_date(); ?></span>
                        <span><?php the_category(', '); ?></span>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <!-- Category Sections -->
        <section class="category-posts">
            <!-- 개발이야기 -->
            <div class="category-section">
                <h2>개발이야기</h2>
                <div class="posts-grid">
                    <?php
                    $dev_posts = new WP_Query(array(
                        'category_name' => 'dev', // 카테고리 슬러그
                        'posts_per_page' => 3
                    ));
                    if($dev_posts->have_posts()) :
                        while($dev_posts->have_posts()) : $dev_posts->the_post();
                    ?>
                    <article class="post-card">
                        <?php if(has_post_thumbnail()) : ?>
                        <div class="card-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="card-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <span class="post-date"><?php the_date(); ?></span>
                        </div>
                    </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

            <!-- 일상 -->
            <div class="category-section">
                <h2>일상</h2>
                <div class="posts-grid">
                    <?php
                    $daily_posts = new WP_Query(array(
                        'category_name' => 'daily', // 카테고리 슬러그
                        'posts_per_page' => 3
                    ));
                    if($daily_posts->have_posts()) :
                        while($daily_posts->have_posts()) : $daily_posts->the_post();
                    ?>
                    <article class="post-card">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <span class="post-date"><?php the_date(); ?></span>
                    </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="widget">
            <h3>About</h3>
            <p>스페인에서 개발 공부하는 노리타입니다.</p>
        </div>
        <div class="widget">
            <h3>Categories</h3>
            <?php wp_list_categories(); ?>
        </div>
    </aside>
</div>

<footer class="main-footer">
    <p>&copy; <?php echo date('Y'); ?> NoritaDev</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>