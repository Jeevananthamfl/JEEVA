<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<!-- Start Blog Comment -->

<div class="comments-and-form-wrap">
    <div class="comments-and-form-wrap-inner shadow-box">
        <h2><?php comments_number( esc_html__('0 Comment', 'gridx'), esc_html__('1 Comment', 'gridx'), esc_html__('% Comments', 'gridx') ); ?></h2>
        <div class="comments">
            <?php wp_list_comments('callback=gridx_theme_comment'); ?>
        </div>

 <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
    <div class="text-center">
      <ul class="pagination">
        <li>
          <?php //Create pagination links for the comments on the current post, with single arrow heads for previous/next
          paginate_comments_links( 
          array(
          'prev_text' => wp_specialchars_decode('<i class="fa fa-angle-left"></i>',ENT_QUOTES),
          'next_text' => wp_specialchars_decode('<i class="fa fa-angle-right"></i>',ENT_QUOTES),
          ));  ?>
        </li> 
      </ul>
    </div>
<?php endif; // Check for comment navigation ?>

<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => '',        
                'class_form' => '', 
                'title_reply_before'=> '<h2>',                
                'title_reply'=> esc_html__( 'Leave a Reply', 'gridx' ),
                'title_reply_after'=> '</h2>',
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'cookies' => '',
                    'author' => '
        <div class="input-group">
            <!-- Name -->
            <input id="author" name="author" type="text" placeholder="'. esc_attr__('Name', 'gridx').'" required="required" >
</div>',
                    'Email' => '
    <div class="input-group">
        <!-- Email -->
        <input id="email" name="email" type="text" placeholder="'.esc_attr__('Email', 'gridx').'" required="required">
    </div>'  ,                                                                                 
                ) ),   
                'comment_field' => '
                <div class="input-group">
                    <textarea name="comment"'.$aria_req.'placeholder="'.esc_attr__('Your Message', 'gridx').'"></textarea>
                </div>',

                 'label_submit' => ''.esc_attr__('Send Message', 'gridx').'',
                 'comment_notes_before' => '',
                 'submit_button' => '<div class="input-group">
                    <button name="%1$s" type="submit" id="%2$s" class="theme-btn %3$s" value="%4$s">%4$s</button>
             </div>',
                 'comment_notes_after' => '',                    
        )
?>
                

<?php if ( comments_open() ) : ?>
<div class="comment-form">
<?php comment_form($comment_args); ?>
</div>
<?php endif; ?> 
<!-- End Comments Form -->
    </div>
</div>