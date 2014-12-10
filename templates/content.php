<!-- Although this is a generic content template, it's used as mt-block in loops. -->
<?php
/*
// 标签优先级：feature, interview, love, news, trans, research, industry, culture [default]
function retrievePriorityTag() {
  if ( has_tag('feature') ) {
    return '专题';
  } else if ( has_tag('interview') ) {
    return '访谈';
  }  else if ( has_tag('love') ) {
    return '漫评';
  }  else if ( has_tag('news') ) {
    return '资讯';
  }  else if ( has_tag('trans') ) {
    return '译文';
  }  else if ( has_tag('research') ) {
    return '考据';
  }  else if ( has_tag('industry') ) {
    return '业界';
  }  else if ( has_tag('culture') ) {
    return ' 文化';
  } else {
    return '文章';
  }
  return '文章';
}
 $tagText = retrievePriorityTag();
*/
?>

<article class="block-panel">
  <div class="block-cover-wrapper">
    
    <div class="block-cover" <?php post_class();
     // Retrieve cover image URL then set header's background
    if ( has_post_thumbnail() ) {
      $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' )[0];
    } else {
      $cover_img_url = get_template_directory_uri().'/assets/img/thumb_default.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
      <a href="<?php the_permalink(); ?>"><div class="cover-shade"></div></a>
    
      <div class="row block-content">
        <header class="block-category">
          <!-- #TODO: write the algorithm to retrieve the primary tag to display below. -->
          <span class="entry-category text-contrast">
            <a href="">
              <?php 
              if ( has_tag('feature') ) {
                echo '专题';
              } else if ( has_tag('interview') ) {
                echo '访谈';
              } else if ( has_tag('love') ) {
                echo '漫评';
              } else if ( has_tag('news') ) {
                echo '资讯';
              } else if ( has_tag('trans') ) {
                echo '译文';
              } else if ( has_tag('research') ) {
                echo '考据';
              } else if ( has_tag('industry') ) {
                echo '业界';
              } else if ( has_tag('culture') ) {
                echo '文化';
              } else if ( has_tag('mangatalk') ) {
                echo '站务';
              } else if ( has_tag('scomix-misemono') ) {
                echo '夜话';
              } else if ( has_tag('scomix-special') ) {
                echo '特稿';
              } else if ( has_tag('scomix-ishi') ) {
                echo '探石';
              } else if ( has_tag('specialcomix') ) {
                echo '异漫';
              } else {
                echo '文章';
              } ?>
            </a>
          </span>
        </header>
        
        <header class="block-header">
          <h4 class="entry-title text-contrast">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h4>
          <div class="entry-meta">
            <span class="entry-author-name text-contrast">
            By <a class="text-contrast" href="<?php echo get_author_posts_url( get_the_author_meta('ID'), $author_nicename ); ?>">
                <?php echo the_author_meta( 'display_name' ); ?>
              </a>
            </span> &nbsp; 
            <span class="entry-comment-count text-contrast alignright">
              <?php comments_number( '', 
              '1 <span class="glyphicon glyphicon-comment"></span>', 
              '% <span class="glyphicon glyphicon-comment"></span>' ); ?>
            </span>
          </div>
          <div class="excerpt hidden text-contrast">
            <?php the_excerpt(); ?>
          </div>
        </header><!-- .block-header -->
      </div><!-- .block-content -->
      
    </div><!-- .block-cover -->
    
  </div><!-- .block-cover-wrapper -->
</article>
