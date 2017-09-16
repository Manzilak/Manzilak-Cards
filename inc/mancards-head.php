<?php  

    ini_set('display_errors', 1);
    if( !defined( 'ABSPATH' ) ) {
        exit;
    }
    
    global $post;
    
    // Variables needed
    $website_url = get_bloginfo( 'url' );
    $website_title = get_bloginfo( 'name' );
    $website_subtitle = get_bloginfo( 'description' );
    $website_charset = get_bloginfo( 'charset' );
    $website_image = wp_site_icon();
    
    // Article Data
    $article_title = is_single() ? strip_tags( $post->post_title ) : '';
    if( $post && $post->post_excerpt === "" ) {
        $excerpt = strip_tags( $post->post_content );
        $excerpt = explode( ' ' , $excerpt );
        $excerpt = array_values( array_slice($excerpt, 0, 40) );
        $article_description = implode( ' ' , $excerpt );
    } else {
        $article_description = is_single() ? $post->post_excerpt : '';
    }

    $article_author = the_author();
    $article_url = is_single() ? get_permalink( $post->ID ) : '';
    $article_image = is_single() ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0] : '';
    $article_date = is_single() ? $post->date : '';
    $article_modified = is_single() ? $post->post_modified : '';
    $article_category = is_single() ? get_the_category()[0]->name : '';
    $article_link = is_single() ? get_category_link( get_the_category()[0]->cat_ID ) : '';
    
    if( get_the_tags() ) {
        foreach( get_the_tags() as $tags ) {
            $keywords[] = $tags->name;
        }
            $article_keywords = implode( ' ' , $keywords );
        } else {
            $article_keywords = "";
    }

    // Facebook OG
    $facebook_app_id = get_option('manzilak_cards_facebook_app_id');

    // Twitter Cards
    $twitter_account = "@" . get_option('manzilak_cards_facebook_app_id');

    // Home costumized tags 
    $seo_home_metas = "
    <!-- SEO Home Tags -->
    <meta name=\"description\" content=\"{$website_subtitle}\" />
    <meta name=\"robots\" content=\"noarchive,noodp,noydir\" />
    <meta name=\”keywords\” content=\”the keyword universe alqafilah is competing in\” />
    <meta rel=\"canonical\" content=\"{$website_url}\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />
    ";
    $facebook_home_og = "
    <!-- Facebook Home OG Tags -->
    <meta property=\”og:locale\” content=\”{$website_charset}\” />
    <meta property=\”og:site_name\” content=\”{$website_title}\" />
    <meta property=\”og:title\” content=\”{$website_title}\" />
    <meta property=\”og:type\” content=\”website\”>
    <meta property=\”og:description\” content=\"{$website_subtitle}\" />
    <meta property=\"fb:app_id\" content=\"{$facebook_app_id}\" />
    <meta property=\"og:image\" content=\"{$website_image}\" />
    ";
    $schema_home_tags = "
    <!-- Schema Home Tags -->
    <meta itemprop=\”name\” content=\”{$website_title}\" />
    <meta itemprop=\description\” content=\"{$website_subtitle}\" />
    ";
    $twitter_home_cards = "
    <!-- Twitter Article Cards Tags -->
    <meta name=\"twitter:title\" content=\"{$website_title}\" />
    <meta name=\twitter:url\" content=\"{$website_url}\" />
    <meta name=\"twitter:description\" content=\"{$website_subtitle}\" />
    <meta name=\"twitter:site\" content=\"{$twitter_account}\" />
    ";

    // Article costumized tags 
    $seo_article_metas = "
    <!-- SEO Article Tags -->
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />
    <link rel=\"canonical\" content=\"{$article_url}\" />
    <meta name=\"description\" content=\"{$article_description}\" />
    <meta name=\"author\" content=\"{$article_author}\" />
    <meta name=\”keywords\” content=\”{$article_keywords}\” />
    <meta name=\"publisher\" content=\"{$website_title}\" />
    <meta name=\"robots\" content=\"noarchive,noodp,noydir\" />
    <meta name=\"genre\" content=\"News\" />
    ";
    $facebook_article_og = "
    <!-- Facebook Article OG Tags -->
    <meta property=\”og:locale\” content=\”{$website_charset}\” />
    <meta property=\”og:site_name\” content=\”{$website_title}\" />
    <meta property=\”og:title\” content=\”{$article_title}\" />
    <meta property=\"og:url\" content=\"{$article_url}\" />
    <meta property=\”og:type\” content=\article\”>
    <meta property=\”og:description\” content=\"{$article_description}\" />
    <meta property=\"og:image\" content=\"{$article_image}\" />
    <meta property=\"article:published_time\" content=\"{$article_date}\" />
    <meta property=\"og:updated_time\" content=\"{$article_modified}\" />
    <meta property=\"article:section\" content=\"{$article_category}\" />
    <meta property=\"article:section_url\" content=\"{$article_link}\">
    <meta property=\"fb:app_id\" content=\"{$facebook_app_id}\" />
    ";
    $schema_article_tags = "
    <!-- Schema Article Tags -->
    <meta itemprop=\”name\” content=\”{$article_title}\" />
    <meta itemprop=\description\” content=\"{$article_description}\" />
    <meta itemprop=\"datePublished\" content=\"{$article_date}\" />
    <meta itemprop=\"dateModified\" content=\"{$article_modified}\" />
    <meta itemprop=\"articleSection\" content=\"{$article_category}\" />
    <meta property=\"article:section_url\" content=\"{$article_link}\">
    <meta itemprop=\"inLanguage\" content=\”{$website_charset}\”>
    <meta itemprop=\"genre\ content=\"News\">
    <meta itemprop=\"image\" content=\"{$article_image}\" />
    ";
    $twitter_article_cards = "
    <!-- Twitter Article Cards Tags -->
    <meta name=\"twitter:title\" content=\"{$article_title}\" />
    <meta name=\twitter:url\" content=\"{$article_url}\" />
    <meta name=\"twitter:description\" content=\"{$article_description}\" />
    <meta name=\"twitter:image\" content=\"{$article_image}\" />
    <meta name=\"twitter:card\" content=\"summary_large_image\">
    <meta name=\"twitter:site\" content=\"{$twitter_account}\" />
    ";