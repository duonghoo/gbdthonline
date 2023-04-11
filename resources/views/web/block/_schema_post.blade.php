<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "NewsArticle",
        "headline": "{{ strip_quotes($oneItem->meta_title) }}",
        "description": "{{ $seo_data['meta_description'] ?? '' }}",
        "datePublished": "{{ date('c', strtotime($oneItem->displayed_time)) }}",
        "dateModified": "{{ date('c', strtotime($oneItem->updated_time)) }}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ url($oneItem->thumbnail) }}",
            "width": "1200",
            "height": "650"
        },
        "author": {
            "@type": "Person",
            "name": "Đổi thưởng online"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ env('DOMAIN') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ url(getSiteSetting('site_logo')) }}",
                "width": "600",
                "height": "60"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "name": "{{ getUrlPost($oneItem, 0) }}"
        }
    }
</script>
