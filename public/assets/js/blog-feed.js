function getRSSFeed() {
    $username = 'sportsdecombats';

    // Method 1: RSS from Instagram
    $rss_url = "https://www.instagram.com/{$username}/feed/?__a=1&__d=dis";

    // Method 2: Using RSS.app or similar service
    $rss_service_url = "https://rss.app/feeds/oNEJD9sxon5xD0XP.xml";

    $xml = simplexml_load_file($rss_service_url);
    return $xml;
}
