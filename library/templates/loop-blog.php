<?php $counter = 1; ?>

<?php 
    if ( have_posts() ) {
        while( have_posts() ){
            the_post(); 
            $counter++; 
            get_template_part('library/templates/blog', 'element');

            if($counter == 5) {
                if ( is_active_sidebar('cat_index_ads1')) { dynamic_sidebar('cat_index_ads1'); } else { echo '<li class="ads"></li>'; }
                if ( is_active_sidebar('cat_index_ads2')) { dynamic_sidebar('cat_index_ads2'); } else { echo '<li class="ads"></li>'; }
            }

            if($counter == 9) {
                if ( is_active_sidebar('cat_index_ads3')) { dynamic_sidebar('cat_index_ads3'); } else { echo '<li class="ads"></li>'; }
                if ( is_active_sidebar('cat_index_ads4')) { dynamic_sidebar('cat_index_ads4'); } else { echo '<li class="ads"></li>'; }
            }
        }
    } else {
        get_search_form();    
    }
?>