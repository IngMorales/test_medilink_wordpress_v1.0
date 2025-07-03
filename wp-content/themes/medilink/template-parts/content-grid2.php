<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
$thumb_size = MEDILINK_THEME_PREFIX . '-size3';
$comments_number = number_format_i18n( get_comments_number() );
$comments_html  = $comments_number;
$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content = "<p>$content</p>";
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt single-item' ); ?>>
	<div class="blog-box-layout4">
		<?php if ( has_post_thumbnail() ){ ?>
			 <div class="item-img">
	           <a href="<?php the_permalink();?>" rel="bookmark">
					<?php the_post_thumbnail( $thumb_size ); ?>
				</a>	
				 <?php if ( $has_entry_meta_2 ): ?>			
	            <div class="post-date"><span class="updated published"> <?php the_time( get_option( 'date_format' ) );?></span>
	            </div>
	             <?php endif; ?>
	        </div>	
	        <div class="item-content entry-content">		
				<?php } else{	?>
					 <?php if ( $has_entry_meta_2 ): ?>		
						<div class="item-img no-img">	           			
				            <div class="post-date"><span class="updated published"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time( get_option( 'date_format' ) );?></span>
				            </div>
				        </div>		
				          <div class="item-content entry-content  no-img">
			         <?php endif; ?>
			     <?php } ?>	      
	            <h2 class="item-title">
	                <a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title();?></a>
	            </h2>	
			<div class="entry-summary">
			 	<?php echo wp_kses_post( $content );?>
			</div>
            <?php if ( $has_entry_meta_2 ): ?>
			<div class="post-actions-wrapper">
                <ul>
                <?php if ( RDTheme::$options['blog_author_name'] ): ?>
					<li class="vcard-author"> <i class="flaticon-people"></i> <span class="vcard author"> <?php the_author_posts_link();?></span></li>
				<?php endif; ?>	
                <?php if ( RDTheme::$options['blog_comment_num']): ?>
					<li class="vcard-comments"> <a href="<?php the_permalink();?>"> <i class="flaticon-interface"></i> <?php echo wp_kses_post( $comments_html );?></a></li>
				<?php endif; ?>	
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>	
</article>