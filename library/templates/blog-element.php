<?php
    $posttags = get_the_tags();

    $output_tags = $posttags ? array_slice($posttags, 0, 2) : array();
    $tag_count = count($posttags);
    $thumbnail = get_the_post_thumbnail(null, 'kopa-image-size-4'); 
?>
<li id="li-post-<?php the_ID(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry-item clearfix'); ?>>
        <a href="<?php the_permalink(); ?>">
            <div class="entry-thumb <?= ($thumbnail) ? '' : 'no-image'?> ">
                <?php if ($thumbnail) { echo $thumbnail; } ?>
                <?php if ($posttags) : ?>
                    <div class="tags">
                        <?php foreach($output_tags as $tag) : ?>
                            <?php
                                $tag_link = get_tag_link( $tag->term_id );
                                if($tag->name) {
                                    echo "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a>";
                                }
                            ?>
                        <?php endforeach; ?>
                        <?php if($tag_count > 2) { echo ' ...'; } ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
    </article>
    <div class="entry-content">
        <header>
            <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        </header>
    </div>
</li>