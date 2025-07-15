<?php
/**
 * Comments template
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee;">
    
    <?php if (have_comments()) : ?>
        <h3 class="comments-title" style="color: #1e3a8a; margin-bottom: 30px;">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count == 1) {
                echo '1 Comment';
            } else {
                echo $comment_count . ' Comments';
            }
            ?>
        </h3>

        <ol class="comment-list" style="list-style: none; padding: 0;">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'callback' => 'techwix_comment_callback'
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" style="margin: 30px 0;">
                <div class="nav-previous"><?php previous_comments_link('Older Comments'); ?></div>
                <div class="nav-next"><?php next_comments_link('Newer Comments'); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments" style="color: #666; font-style: italic;">Comments are closed.</p>
    <?php endif; ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $comment_form_args = array(
        'title_reply' => 'Leave a Comment',
        'title_reply_to' => 'Leave a Reply to %s',
        'cancel_reply_link' => 'Cancel Reply',
        'label_submit' => 'Post Comment',
        'comment_field' => '<div class="form-group">
            <label for="comment">Comment *</label>
            <textarea id="comment" name="comment" rows="6" required></textarea>
        </div>',
        'fields' => array(
            'author' => '<div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="author">Name' . ($req ? ' *' : '') . '</label>
                    <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . '>
                </div>',
            'email' => '<div class="form-group">
                    <label for="email">Email' . ($req ? ' *' : '') . '</label>
                    <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '"' . $aria_req . '>
                </div></div>',
            'url' => '<div class="form-group">
                <label for="url">Website</label>
                <input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '">
            </div>'
        ),
        'class_submit' => 'submit-btn',
        'submit_button' => '<button type="submit" class="submit-btn">%4$s</button>'
    );

    comment_form($comment_form_args);
    ?>

</div>

<style>
.comments-area {
    max-width: 100%;
}

.comment-list {
    margin: 0;
    padding: 0;
}

.comment-list .comment {
    background: #f8fafc;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    border-left: 3px solid #3b82f6;
}

.comment-list .children {
    margin-left: 30px;
    margin-top: 20px;
}

.comment-meta {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.comment-author {
    font-weight: 600;
    color: #1e3a8a;
}

.comment-metadata {
    color: #666;
    font-size: 14px;
}

.comment-metadata a {
    color: #666;
    text-decoration: none;
}

.comment-content {
    color: #333;
    line-height: 1.6;
}

.reply {
    margin-top: 15px;
}

.reply a {
    background: #3b82f6;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s;
}

.reply a:hover {
    background: #1e40af;
}

.comment-form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-top: 30px;
}

.comment-form h3 {
    color: #1e3a8a;
    margin-bottom: 20px;
}

.comment-form .form-group {
    margin-bottom: 20px;
}

.comment-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}

.comment-form input,
.comment-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.comment-form input:focus,
.comment-form textarea:focus {
    outline: none;
    border-color: #3b82f6;
}

@media (max-width: 768px) {
    .comment-list .children {
        margin-left: 15px;
    }
    
    .form-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php
// Custom comment callback function
if (!function_exists('techwix_comment_callback')) {
    function techwix_comment_callback($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <div class="comment-body">
                <div class="comment-meta">
                    <div class="comment-author vcard">
                        <?php echo get_avatar($comment, 50, '', '', array('class' => 'avatar')); ?>
                        <span class="fn"><?php comment_author_link(); ?></span>
                    </div>
                    <div class="comment-metadata">
                        <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                            <time datetime="<?php comment_time('c'); ?>">
                                <?php comment_date(); ?> at <?php comment_time(); ?>
                            </time>
                        </a>
                    </div>
                </div>
                
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>
                
                <div class="reply">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth']
                    )));
                    ?>
                </div>
            </div>
        <?php
    }
}
?>
