<?php get_header(); ?>

 <div class="single-blog-post">
	 <?php if ( ! have_posts() ) : ?>
	        <h1>Not Found</h1>
	            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>
	<?php endif; ?>
	 
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="post-image-area overlay-group">
			<div class="overlay-top"></div>
			<?php if( has_post_thumbnail(the_ID()) && is_numeric(the_ID())): ?>
                    <img class="post-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($fp_post->ID), 'large')[0]; ?>">
            <?php endif;?>
			
			<div class="post-info overlay-bottom">
				<h1 class="title"><?php the_title(); ?></h1>
				<p class="text-muted"><?php time_since(the_date()) ?></p>
			</div>
		</div>
		<div class="wrapper post-content">
			<?php the_content(); ?>
		</div>
		
	<?php endwhile; ?>	
</div> 
<?php get_footer(); ?>