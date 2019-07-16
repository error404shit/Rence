<?php $comments = get_comments('status=approve&number=4'); ?>
<ul class="recomm">
<?php foreach ($comments as $comment) { ?>
    <li class="recomm-wrapper">
        <?php
            $title = get_the_title($comment->comment_post_ID);
            echo get_avatar( $comment, '53' );
        ?>
        <a href="<?php echo get_permalink($comment->comment_post_ID); ?>"
           rel="external nofollow" title="<?php echo $title; ?>">
           <?php 
           echo '<span class="com-title">'. $title . '</span><br>'; 
           ?> 
        </a>
        <?php 
          echo '<span class="recommauth">' . ($comment->comment_author) . '</span>';
         ?>
    </li>
<?php }  ?>
</ul>