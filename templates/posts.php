<div class="alrp_main_section">
            <h3>Related Posts</h3>
    <div class="all_posts">
        <?php foreach($posts as $post):
            $permalink = get_permalink( $post->ID );
            $bg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $user = get_user_by('id', $post->post_author );
        ?>
            <div class="single_item">
                <a href="<?php echo esc_url( $permalink ); ?>">
                    <div class="img">
                        <img class="post-image" src="<?php echo $bg ? esc_url( $bg[0] ) : 'https://i.ibb.co.com/2Pv3BQn/dummy-image-square.jpg'; ?>" alt="image">
                    </div>
                </a>
                <a class="title" href="<?php echo esc_url( $permalink ); ?>">
                    <?php echo esc_html($post->post_title); ?>
                </a>
                <p class="content">  
                <?php echo esc_html( wp_trim_words( $post->post_content, 15, '...' ) ); ?>
                </p>
                <a class="read_more_btn" href="<?php echo esc_url( $permalink ) ?>">Read More</a>
                <div class="profile">
                    <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>" alt="image-avater">
                    <h4><?php echo esc_html($user->display_name);?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>    
</div>