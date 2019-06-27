<?php
/**
 * Template part for displaying the post stats. 
 * This template is shared across the excerpt and entry templates.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php 
$icReveal = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="icon/ic_reveal" fill="none" fill-rule="evenodd"><path d="M11.9874072,19 C8.62520457,19 5.55366373,17.0542772 2.7727847,13.1628316 C2.27573983,12.4672878 2.2757396,11.5327267 2.77277778,10.8371781 C5.55365864,6.94572604 8.62520178,5 11.9874072,5 C15.3496098,5 18.4211507,6.94572281 21.2020297,10.8371684 C21.6990746,11.5327122 21.6990748,12.4672733 21.2020366,13.1628219 C18.4211558,17.054274 15.3496126,19 11.9874072,19 Z M11.9874072,17 C14.7464219,17 17.2607792,15.537711 19.5304792,12.613133 L19.5305079,12.6131553 C19.8105139,12.2523589 19.8105146,11.7477031 19.5305095,11.3869059 C17.2608015,8.46230197 14.7464341,7 11.9874072,7 C9.22839254,7 6.7140352,8.46228899 4.44433518,11.386867 L4.44430655,11.3868447 C4.16430048,11.7476411 4.16429982,12.2522969 4.44430495,12.6130941 C6.71401287,15.537698 9.22838029,17 11.9874072,17 Z M11.9874072,8 C14.1965462,8 15.9874072,9.790861 15.9874072,12 C15.9874072,14.209139 14.1965462,16 11.9874072,16 C9.77826821,16 7.98740721,14.209139 7.98740721,12 C7.98740721,9.790861 9.77826821,8 11.9874072,8 Z M11.9874072,10 C10.8828377,10 9.98740721,10.8954305 9.98740721,12 C9.98740721,13.1045695 10.8828377,14 11.9874072,14 C13.0919767,14 13.9874072,13.1045695 13.9874072,12 C13.9874072,10.8954305 13.0919767,10 11.9874072,10 Z" id="ic_reveal" fill="#999"></path></g></svg>';

$icReview = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="icon/ic_review" fill="none" fill-rule="evenodd"><path d="M19,4 L5,4 C3.8954305,4 3,4.8954305 3,6 L3,15 C3,16.1045695 3.8954305,17 5,17 L11,17 L15.36,20.63 C15.6583354,20.8784924 16.0735425,20.9318337 16.4250008,20.7668198 C16.776459,20.6018059 17.0006314,20.2482681 17,19.86 L17,17 L19,17 C20.1045695,17 21,16.1045695 21,15 L21,6 C21,4.8954305 20.1045695,4 19,4 Z M19,15 L15,15 L15,17.73 L11.72,15 L5,15 L5,6 L19,6 L19,15 Z" id="ic_review" fill="#999" fill-rule="nonzero"></path></g></svg>';

$icThumbsUp = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="icon/ic_thumbs_up" fill="none" fill-rule="evenodd"><path d="M16,8.72965599 L19,8.72965599 C20.0434604,8.72965599 20.9090424,9.53135602 20.993357,10.5661228 L21.0047477,10.7059174 L19.3215536,19.1218884 C19.1345838,20.0567367 18.3137542,20.729656 17.3603922,20.729656 L5,20.729656 C3.89543051,20.729656 3,19.8342255 3,18.729656 L3,11.729656 C3,10.6250865 3.89543051,9.72965599 5,9.72965599 L7.84997559,9.72965599 L11.2586294,3.98015336 C11.73633,3.17440767 12.7092743,2.80815275 13.5997287,3.0988714 C14.7013375,3.45852859 15.5098011,3.99435755 16,4.72965598 C16.702641,5.78361739 16.6727445,7.12295221 16,8.72965599 Z M12.9943356,10.729656 L14.1551878,7.95721296 C14.5937359,6.90983649 14.6085099,6.24797216 14.3358994,5.83905634 C14.1236482,5.52067959 13.6869311,5.23123462 12.9790075,5.00010392 L8.98932097,11.729656 L5,11.729656 L5,18.729656 L17.3603922,18.729656 L18.9603922,10.729656 L12.9943356,10.729656 Z M7,10 L9,10 L9,20 L7,20 L7,10 Z" id="ic_thumbs_up" fill="#999" fill-rule="nonzero"></path></g></svg>';

global $post;
$post_views = get_post_meta( $post->ID, '_post_views', true );
if ( $post_views == '' ) {
 $post_views = 0;
}

if ( is_plugin_active( 'mangatalk-likes/mangatalk-likes.php' ) ) {
  $post_likes = get_post_meta( get_the_ID(), 'post_likes', true );
  if ( $post_likes == '' ) {
    $post_likes = 0;
   }
}
$comments_count = get_comments_number( $post->ID );
?>

<div class="feed__meta">
  <span class="feed__meta__icon"><?php echo $icReveal; ?></span>
  <span class="feed__meta__label">
    <?php echo esc_attr( $post_views ); ?>
  </span>
</div>
<?php if ( is_plugin_active( 'mangatalk-likes/mangatalk-likes.php' ) ) : ?>
<div class="feed__meta">
  <span class="feed__meta__icon"><?php echo $icThumbsUp; ?></span>
  <span class="feed__meta__label">
    <?php echo esc_attr( $post_likes ); ?>
  </span>
</div>
<?php endif; ?>
<div class="feed__meta">
  <span class="feed__meta__icon"><?php echo $icReview; ?></span>
  <span class="feed__meta__label"><?php echo $comments_count; ?></span>
</div>