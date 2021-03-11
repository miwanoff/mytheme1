<!-- Blog Post -->
<div class="card mb-4">
    <?php if (has_post_thumbnail()) {
    the_post_thumbnail("full", ["class" => "card-img-top"]);
}
?>
    <div class="card-body">
        <h2 class="card-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
        <h3><?php the_category(" ")?></h3>
        <?php the_excerpt()?>
        <a href="<?php the_permalink()?>" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        Posted on <?php echo get_the_date() ?> by
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author()?></a>
        Comments: <?php comments_number("0");?>
    </div>
</div>