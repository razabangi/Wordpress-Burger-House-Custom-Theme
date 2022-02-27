

<?php if( comments_open() ): ?>
<div class="custombox clearfix">
    <h4 class="small-title">3 Comments</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <?php 
                $args = [
                    'status' => 'approve'
                ];
                $comments_query = new WP_Comment_Query;
                $comments = $comments_query->query( $args );

                ?>
                <?php foreach ($comments as $comment): ?>
                    
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="upload/author.jpg" alt="" class="rounded-circle">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading user_name"><?php comment_author(); ?> <small><?php comment_date(); ?></small></h4>
                        <p><?php comment_text(); ?></p>
                        <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end custom-box -->

<hr class="invis1">

<?php endif; ?>

<div class="custombox clearfix">
    <h4 class="small-title">Leave a Reply</h4>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-wrapper" action="<?php echo site_url('wp-comments-post.php'); ?>" method="post" id="commentform">
                <input type="hidden" name="comment_post_ID" id="comment_post_ID" value="<?php echo $post->ID; ?>">
                <input type="text" class="form-control" name="author" placeholder="Your name">
                <input type="text" class="form-control" name="email" placeholder="Email address">
                <input type="text" class="form-control" name="url" placeholder="Website">
                <textarea class="form-control" placeholder="Your comment" name="comment"></textarea>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        </div>
    </div>
</div>