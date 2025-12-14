<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper ::loadHeader('Blog !');

$user = UserContext ::getCurrentUser();

$post_URL_source = "./assets/images/website-images/tripdvisor-2025-640w-400x400.webp";
$post_alt = "tripdvisor";


//
//{
//    "inputUrl": "https://www.instagram.com/humansofny",
//  "url": "https://www.instagram.com/p/C3TTthZLoQK/",
//  "type": "Image",
//  "shortCode": "C3TTthZLoQK",
//  "caption": "“Biology gives you a brain. Life turns it into a mind.” Jeffrey Eugenides\n\nCongolese Refugees\n\n#congolese #congo #drc #refugee #refugees #bw #bwphotography #sony #sonyalpha #humanity #mind",
//  "hashtags": [],
//  "mentions": [],
//  "commentsCount": 1,
//  "firstComment": "We love your posts blend ! Message us to be featured! 🔥",
//  "latestComments": [],
//  "dimensionsHeight": 720,
//  "dimensionsWidth": 1080,
//  "displayUrl": "https://scontent-lga3-2.cdninstagram.com/v/t51.2885-15/426457868_1775839306212473_2684687436495806019_n.jpg?stp=dst-jpg_e35_s1080x1080&_nc_ht=scontent-lga3-2.cdninstagram.com&_nc_cat=105&_nc_ohc=UxY2B6TAloEAX9nHKi1&edm=AP_V10EBAAAA&ccb=7-5&oh=00_AfBSNWqMiaU24y8nOwL5sx-NC7TuvyXB6jzOXhs7oaNvHQ&oe=65D3DB7E&_nc_sid=2999b8",
//  "images": [],
//  "alt": "Photo shared by Brian René Bergeron on February 13, 2024 tagging @natgeo, @life, @people, @humansofny, @voiceofcongo, @sonyalpha, @congo_on_the_map, and @sony. May be a black-and-white image of 2 people, child and text.",
//  "likesCount": 40,
//  "timestamp": "2024-02-13T20:49:57.000Z",
//  "childPosts": [],
//  "ownerFullName": "Brian René Bergeron",
//  "ownerUsername": "blend603",
//  "ownerId": "5566937141",
//},

?>

<div id="home-wrapper">

    <div class="blog-post-wrapper">
        <img class="blog-post-image" src="<?= $post_URL_source ?>" alt="<?= $post_alt; ?>">
        <span class="blog-post-title">AAAAA</span>
        <div class="blog-post-hashtags-wrapper">
            <span id="first-hashtag">nfjaldsnfajslfn</span>
            <span id="second-hashtag">nfjaldsnfajslfn</span>
            <span id="third-hashtag">nfjaldsnfajslfn</span>
        </div>
        <p class="blog-post-description"></p>
    </div>

    <div class="blog-popup-wrapper">
        <img class="blog-popup-image" src="<?= $post_URL_source ?>" alt="<?= $post_alt; ?>">
        <span class="blog-popup-title">AAAAA</span>
        <div class="blog-popup-hashtags-wrapper">
            <span id="hashtag-list">nfjaldsnfajslfn</span>
        </div>
        <span class="blog-post-description">hfjasnfjkdbnasjkbfnj fhasjk fhdjkadshfjhsjka hfjkash fjhasdjk fasjkfh jkashdjkf hjaskdhf jashdkfh ajksfjk</span>
    </div>



</div>


<?php

ViewHelper ::loadFooter();
