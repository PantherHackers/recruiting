<?php get_header(); ?>
	<div class="main-content" id="main-content">		
		<?php if(is_home()): ?>
			<div class="wrapper section-padding">
				<h2 class="heading">Welcome to PantherHackers</h2>
				<p><?php bloginfo('description'); ?></p>
			</div>
		<?php endif; ?>
		
		<div class="wrapper">
			<?php if(is_home()): ?>
				<?php $numberOfPosts = 3; ?>
			<?php else: ?>
				<h2 class="heading top-heading">Blog</h2>
				<?php $numberOfPosts = 6; ?>
			<?php endif; ?>
			fdfd
			<div <?php if(is_home()){ echo 'class="theme-light"'; }?>>
				<div class="blog-posts clearfix">
					<?php 	
						    $recent_posts = get_posts(array('numberposts' => $numberOfPosts));
							for($i=0; count($recent_posts) > $i; $i++):
							$post = $recent_posts[$i];
					?>
								<figure class="blog-post">
									<img src="http://lorempixel.com/350/200" alt="">
									<a href="<?php echo $post->guid;?>">
										<figcaption>
											<p class="category"><?php echo get_the_category_by_ID($post->ID); ?></p>
											<p class="title"><?php echo $post->post_title ?></p>
											<p class="excerpt"><?php echo $post->post_excerpt ?></p>
											<p class="text-muted text-small"> <?php time_since($post->post_date); ?></p>
											<p><a href="<?php echo $post->guid ?>" class="btn"> Read More </a></p>
										</figcaption>
									</a>
								</figure>
					<?php endfor; ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>