<?php
/**
 * The template that displays the bio section on author archive pages.
 * Structurally similar to content/content-post-meta.
 * TODO: Consolidate this and content/content-post-meta.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
// TODO: why is this variable, defined in author.php, not available here and forcing me to redeclare?
$authorId = get_the_author_meta( 'ID' ); 

// Description processing
$authorDesc = get_the_author_meta( 'description' );
if (!$authorDesc) {
  $authorDesc = '这个家伙很懒，什么都没有留下。';
}

// Social links processing
$authorMeta = get_userdata( $authorId, '', true );
$authorWeibo = $authorMeta->weibo;
$authorDouban = $authorMeta->douban;
$authorUrl = $authorMeta->user_url;

// Role processing
$rolesMapping = [
  'administrator' => '漫言苦力',
  'editor' => '漫言编辑',
  'author' => '漫言作者',
  'contributor' => '漫言成员',
  'subscriber' => '漫言用户',
];
$authorRole = $rolesMapping[$authorMeta->roles[0]];
?>

<aside class="author-bio author-bio__archive">
  <div class="author-bio__content">
    <div class="author-bio__image">
      <a href="<?php echo get_author_posts_url( $authorId ); ?>">
        <?php echo get_avatar( $authorId, 48 ); ?>
      </a>
    </div>
    <div class="columnrec__meta">
      <a class="columnrec__authorlink" href="#">
        <?php echo get_the_author_meta( 'display_name' ); ?>
        <span class="columnrec__authorcount">
          <?php echo count_user_posts( $authorId ); ?> 篇文章
        </span>
      </a>
      <div class="author-bio__meta">
        <span class="author-bio__meta__item"><?php echo $authorRole ?></span>
        <?php if ( $authorUrl ): ?>
          <a class="author-bio__meta__item" href="<?php echo $authorUrl ?>" target="_blank">
            博客
          </a>
        <?php endif; ?>
        <?php if ( $authorDouban ): ?>
          <a class="author-bio__meta__item" href="<?php echo $authorDouban ?>" target="_blank">
            豆瓣
          </a>
        <?php endif; ?>
        <?php if ( $authorWeibo ): ?>
          <a class="author-bio__meta__item" href="<?php echo $authorWeibo ?>" target="_blank">
            微博
          </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="author-bio__desc"><?php echo $authorDesc ?></div>
  </div>
</aside>

