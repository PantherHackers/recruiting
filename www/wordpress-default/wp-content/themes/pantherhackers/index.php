<?php get_header(); ?>
	<div class="main-content" id="main-content">
		<div class="wrapper section-padding">
			<h2 class="heading">Welcome to PantherHackers</h2>
			<p><?php bloginfo('description'); ?></p>
		</div>
		
		<div class="theme-light">
			<div class="blog-posts wrapper clearfix">
				<?php 
					    $recent_posts = get_posts(array('numberposts' => 3));
						for($i=0; count($recent_posts) > $i; $i++):
						$post = $recent_posts[$i];
				?>
						
							<figure class="blog-post">
								<img src="http://lorempixel.com/350/200" alt="">
								<a href="individual.html">
									<figcaption>
										
										<p class="category"><?php echo get_the_category_by_ID($post->ID); ?></p>
										<p class="title"><?php echo $post->post_title ?></p>
										<p class="excerpt"><?php echo $post->post_excerpt ?></p>
										<p class="text-muted text-small">
											<?php
												$date = new DateTime($post->post_date); 
											  	echo $date->diff(new DateTime())->format("%a days %h hours ago"); 
											?>
										</p>
										<p><a href="<?php echo $post->guid ?>" class="btn"> Read More </a></p>
									</figcaption>
								</a>
							</figure>
				<?php endfor; ?>
			</div>
		</div>
			
<?php get_footer(); ?>