<?php

namespace App\Domain\Models;

class BlogM {
    private $rss_blog_url;
    private $cache_timeout = 3600; // keep cache active on server for 1 hour

    public function __construct () {
        $this -> $rss_blog_url = "https://rss.app/feeds/oNEJD9sxon5xD0XP.xml";
    }




$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://api.rss.app/v1/feeds/:feed_id',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
CURLOPT_HTTPHEADER => array(
'Authorization: Bearer YOUR_API_KEY:YOUR_API_SECRET'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}
