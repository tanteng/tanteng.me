<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL; ?>
<urlset>
    <url>
        <loc>http://www.tanteng.me</loc>
        <lastmod>2016-07-29T11:46:52+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>http://www.tanteng.me/blog</loc>
        <lastmod>2016-07-29T11:46:52+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>http://www.tanteng.me/resume</loc>
        <lastmod>2016-07-29T11:46:52+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>http://www.tanteng.me/contact</loc>
        <lastmod>2016-07-29T11:46:52+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach($travels as $travel)
    <url>
        <loc>{{ $travel->url }}</loc>
        <lastmod>{{ date('c', strtotime($travel->updated_at)) }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
