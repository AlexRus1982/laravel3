<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
 
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('sitemap/products') }}</loc>
        <lastmod>{{ $category->updated_at->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap/tags') }}</loc>
        <lastmod>{{ $tag->updated_at->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>