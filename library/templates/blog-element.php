<?php
    $posttags = get_the_tags();
    $tag_count = count($posttags);

    $categories = get_the_category();
    $cat_count = count($categories);

    $output_tags = $posttags ? array_slice($posttags, 0, 2) : array();
    $needed_tags = 2 - count($output_tags);
    $output_cats = ($categories && $needed_tags > 0) ? array_slice($categories, 0, $needed_tags) : array();
    
    $thumbnail = get_the_post_thumbnail(null, 'kopa-image-size-4'); 
?>
<li id="li-post-<?php the_ID(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry-item clearfix'); ?>>
        <a href="<?php the_permalink(); ?>">
            <div class="entry-thumb <?= ($thumbnail) ? '' : 'no-image'?> ">
                <?php if ($thumbnail) { echo $thumbnail; } ?>
            </div>
        </a>
        <?php if ($posttags || $categories) : ?>
            <div class="tags">
                <?php foreach($output_tags as $tag) : ?>
                    <?php
                        $tag_link = get_tag_link( $tag->term_id );
                        echo "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a>";
                    ?>
                <?php endforeach; ?>
                <?php foreach($output_cats as $cat) : ?>

                    <?php
                        $category_link = get_category_link( $cat->term_id );
                        echo "<a href='{$category_link}' title='{$cat->name} Tag' class='{$cat->slug}'>{$cat->name}</a>";
                    ?>
                <?php endforeach; ?>
                <?php if($tag_count + $cat_count > 2) { echo ' ...'; } ?>
            </div>
        <?php endif; ?>
    </article>
    <div class="entry-content">
        <header>
            <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <div class="multiline-overflow"></div>
        </header>
    </div>
</li>