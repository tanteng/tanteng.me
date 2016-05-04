<?php echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($data as $item)
    <url>
        <loc>http://english.tanteng.me/how-to-say/{{ $item['slug'] }}</loc>
        <lastmod>{{ $item['created_at'] }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>