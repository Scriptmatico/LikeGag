<?
/** 
 * Index theme
 *
 */
 get_header();
?>
    
    <div class="container container2">

      <div class="row">

        <div class="col-sm-7 blog-main">
			
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="blog-post">
            <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><? the_title();?></a></h2>
            <p class="blog-post-meta"><? echo the_date();?> por <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><? echo get_the_author();?></a></p>
				
                
            <? the_content(); ?>
			<a class="btn btn-social btn-twitter btn-social-share" href="javascript:void(0);" data-title="<? echo rawurlencode(the_title("","",0));?>" data-url="<? the_permalink();?>">
            	<i class="fa fa-twitter"></i> Share on Twitter
			</a>
            <a class="btn btn-social btn-facebook btn-social-share" href="javascript:void(0);" data-url="<? the_permalink();?>">
            	<i class="fa fa-twitter"></i> Share on Facebook
			</a>

            <div class="dropdown inline-dropdown">
              <button class="btn btn-default dropdown-toggle btn-more-share" type="button" id="dropdownMenu1" data-toggle="dropdown">
                <i class="fa fa-plus-square "></i>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" class="menu-google-plus" data-url="<? the_permalink();?>"><i class="fa fa-google-plus"></i>&nbsp;Google+</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" class="menu-pinterest" data-title="<? echo rawurlencode(the_title("","",0));?>" data-url="<? the_permalink();?>"><i class="fa fa-pinterest"></i>&nbsp;Pinterest</a></li>
                
              </ul>
            </div>
            
          </div><!-- /.blog-post -->
		<?php endwhile; ?>
		<?php else : ?>    
		<div class="blog-post">
            <h2 class="blog-post-title">No Posts Found</h2>
        	You don't have posts    
		</div><!-- /.blog-post -->
		<?
        endif;
		likegag_paging_nav();
		?>
          

        </div><!-- /.blog-main -->

        

<?
get_footer();
?>