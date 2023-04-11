<?php
function getSchemaBreadCrumb($breadCrumb){
    $itemListElement = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Trang chủ',
            'item' => env('APP_URL')
        ]
    ];
    $i=2;
    if (!empty($breadCrumb)) foreach ($breadCrumb as $key => $item) {
        if ($item['schema']) {
            $itemListElement[] = [
                '@type' => 'ListItem',
                'position' => $i,
                'name' => $item['name'],
                'item' => str_replace('/amp', '', $item['item'])
            ];
            $i++;
        }
    }
    $schema = '<script type="application/ld+json">';
    $schema .= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ]);
    $schema .= '</script>';
    return $schema;
}

function getSchemaLogo(){
    $schema = '<script type="application/ld+json">';
    $listItem = json_encode([
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "url" => env('APP_URL'),
        "logo" => url(getSiteSetting('site_logo'))
    ]);

    $schema .= $listItem.'</script>';
    return $schema;
}
function getSchemaArticle($post){
    $schema = '<script type="application/ld+json">';
    $schema .= json_encode([
        "@context" => "https://schema.org",
        "@type" => "NewsArticle",
        "headline" => $post->meta_title,
        "description" => $post->meta_description,
        "image" => [
            "@type" => "ImageObject",
            "url" => $post->thumbnail,
            "width" => 500,
            "height" => 250
        ],
        "datePublished" => $post->displayed_time,
        "dateModified" => $post->updated_time,
        "author" => [
            "@type" => "Person",
            "name" => "Game bài đổi thưởng"
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => env('DOMAIN'),
            "logo" => [
                "@type" => "ImageObject",
                "url" => url(getSiteSetting('site_logo')),
                "width" => 600,
                "height" => 60
            ]
        ],
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => getUrlPost($post)
        ]
    ]);
    $schema .= '</script>';

    return $schema;

}

function getLocalBusiness(){
    $schema = '<script type="application/ld+json">';
    $schema .= json_encode([
        "@context" => "https://schema.org",
        "@type" => "LocalBusiness",
        "name" => "VuongQuocGameBai",
        "image" => url(getSiteSetting('site_logo')),
        "@id" => env('APP_URL'),
        "url" => env('APP_URL'),
        "telephone" => "+84966767898",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "68 Đình Quán, Phúc Diễn",
            "addressLocality" => "Q. Bắc Từ Liêm, TP. Hà Nội",
            "postalCode" => "100000",
            "addressCountry" => "VN"
        ],
        "openingHoursSpecification" => [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
              ],
            "opens" => "08:00",
            "closes" => "17:00",
        ]
        
        

    ]);
    $schema .= '</script>';
    return $schema;

}
?>
