<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once get_template_directory() . '/lib/twitteroauth/twitteroauth.php';

$twitter_customer_key = 'i2srgLjJCXmMhIBISY2sl8R4x';
$twitter_customer_secret = 'ktj0Y1WM4037NWSXT5q3FuKYEje1rIAUccAFasKEgNkCcQGL4f';
$twitter_access_token = '2943862362-vzloeBSOJnpzhScrUlzYOC7yuslvESD5QfOM5Oz';
$twitter_access_token_secret = 'Owzq3MAYW4omyYktbEfn9mbsMxDgQAglpwASt18LIj0rf';

$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);
$x = 0;
$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'echo get_option("twitter_profile");', 'count' => 25));

for ($p = 0; $p < 25; $p++) {
    //function 9preg_replace) to convert text url into links.
    $string = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<br><a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $my_tweets[$p]->text);
    if (!preg_match("/@(\w+)/", $string)) {
        $tweets[$x] = $string;
        $x++;
    }
}

if (isset($my_tweets->errors)) {
    echo 'Error :' . $my_tweets->errors[0]->code . ' - ' . $my_tweets->errors[0]->message;
} else {
    echo '<ul class="margin-class list-group">';
    for ($u = 0, $x = 0; $u < 5; $u++, $x++) {
        echo '<li class="list-group-item list-unstyled">' . $tweets[$x] . '</li>';
    }
    echo '</ul>';
}
