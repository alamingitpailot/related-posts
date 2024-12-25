
<div class="alrp_category">
    <h3>Categories</h3>
    <ul>
        <?php foreach($terms as $term): ?>
            <li><a href="<?php echo get_term_link($term, 'category') ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>