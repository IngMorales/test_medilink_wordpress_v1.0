<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

$thumb_size = MEDILINK_THEME_PREFIX . '-size1';

$comments_number = number_format_i18n( get_comments_number() );
$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'medilink' ) : esc_html__( 'Comments' , 'medilink' );
$comments_html  .= ': '. $comments_number;

$has_entry_meta_1  = RDTheme::$options['post_date'] || ( RDTheme::$options['post_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['post_author_name'] || RDTheme::$options['post_comment_num'] ? true : false;
$thumb_class = has_post_thumbnail() ? '' : ' nothumb';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-single' ); ?>>
	<?php
		if ( has_post_thumbnail() ){ ?>		
		<div class="entry-thumbnail-area<?php echo esc_attr( $thumb_class );?>">
			<?php the_post_thumbnail( $thumb_size );?>		
		</div>	
	<?php } ?>
	<div class="entry-content-area single-blog-wrapper">	
		<ul class="news-meta-info mar20-ul">					
			<?php if ( RDTheme::$options['post_date'] ): ?>
				<li class="item-date">
					 <i class="fa fa-calendar" aria-hidden="true"></i><span class="updated published"> <?php the_time( get_option( 'date_format' ) );?></span></li>
			<?php endif; ?>	
			<?php if ( RDTheme::$options['post_author_name'] ): ?>
				<li class="vcard-author"><i class="fa fa-user" aria-hidden="true"></i><span class="vcard author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fn"><?php the_author(); ?></a></span>
				</li>
			<?php endif; ?>						
			<?php if ( RDTheme::$options['post_comment_num']): ?>
				<li><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo wp_kses_post( $comments_html );?></li>
			<?php endif; ?>

			<?php if ( RDTheme::$options['post_cats'] && has_category() ): ?>
					<li><i class="fa fa-folder-open-o" aria-hidden="true"></i><?php the_category( ', ' );?></li>
				<?php endif; ?>
	
		</ul>						
		<div class="entry-content  single-blog-content-holder"><?php the_content();?></div>
		<?php wp_link_pages( array(
		'before'      => '<div class="medilink-page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'medilink' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		) );
		?>
		<?php if ( RDTheme::$options['post_tags'] && has_tag() ): ?>
			<div class="tag entry-tags"><span><?php esc_html_e( 'Tags:', 'medilink' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ' ); ?></div>	
		<?php endif; ?>
	</div>
</article>