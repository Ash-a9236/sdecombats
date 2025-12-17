<?php
use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('Blog !');

$user = UserContext::getCurrentUser();

// The $posts variable should be passed from your BlogController
// Make sure it's available in the template
if (!isset($posts) || !is_array($posts)) {
    $posts = [];
}

$post_URL_source = "./assets/images/placeholders/base_placeholder.png";
$post_alt = "NA";
?>

<div id="home-wrapper">

    <?php if (empty($posts)): ?>
        <div class="no-posts-message">
            <p>No Blog posts available at the moment. Please check back later!</p>
        </div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="blog-post-wrapper">
                <?php if ($post['post_image_url']): ?>
                    <img class="blog-post-image"
                         src="<?= htmlspecialchars($post['post_image_url']) ?>"
                         alt="<?= htmlspecialchars($post['post_title']) ?>">
                <?php else: ?>
                    <img class="blog-post-image"
                         src="<?= $post_URL_source ?>"
                         alt="<?= $post_alt ?>">
                <?php endif; ?>

                <span class="blog-post-title">
                    <?= htmlspecialchars($post['post_title']) ?>
                </span>

                <?php if (!empty($post['hashtags'])): ?>
                    <div class="blog-post-hashtags-wrapper">
                        <?php
                        // Display up to 3 hashtags
                        $displayHashtags = array_slice($post['hashtags'], 0, 3);
                        foreach ($displayHashtags as $index => $hashtag):
                            $id = ($index === 0) ? 'first-hashtag' :
                                (($index === 1) ? 'second-hashtag' : 'third-hashtag');
                            ?>
                            <span id="<?= $id ?>">#<?= htmlspecialchars($hashtag) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($post['post_text'])): ?>
                    <p class="blog-post-description">
                        <?= htmlspecialchars($post['post_text']) ?>
                    </p>
                <?php endif; ?>

                <?php if ($post['post_url']): ?>
                    <a href="<?= htmlspecialchars($post['post_url']) ?>"
                       target="_blank"
                       class="original-post-link">
                        View on Instagram
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Popup for detailed view -->
    <div class="blog-popup-wrapper" id="blog-popup" style="display: none;">
        <button class="close-popup" onclick="closePopup()">×</button>
        <img class="blog-popup-image" id="popup-image" src="" alt="">
        <span class="blog-popup-title" id="popup-title"></span>
        <div class="blog-popup-hashtags-wrapper">
            <span id="hashtag-list"></span>
        </div>
        <span class="blog-popup-description" id="popup-description"></span>
    </div>

</div>