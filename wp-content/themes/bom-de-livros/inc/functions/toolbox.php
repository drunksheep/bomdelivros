<?php

/**
 *
 * @method formatWhatsappNumber | Transforms a phone number string into a valid whatsapp click to call link.
 * @param String $string | String to transform
 * @return String | Formatted string
 *
*/

function formatWhatsappNumber(string $string = '') : String
{
    $special_characters = ['.', ',', ' ', '-', '_', ''];
    $string = str_replace( $special_characters, '', $string );
    $string = 'https://wa.me/55' . $string;
    return $string;
}

/**
 *
 * @method excerpt | Excerpts a string based on a limit
 * @param Int $limit | Max number of sentences
 * @param String $intance | String to excerpt
 * @return String | Formatted excerpt string
 *
*/

function excerpt(int $limit = 20, string $instance = '') : string
{

	$excerpt = explode(' ', $instance, $limit);

	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode(' ', $excerpt ) . ' ...';
    }

	else {
		$excerpt = implode( ' ', $excerpt );
	}

    $excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	return $excerpt;
}


/**
 *
 * @method get_responsive_source | returns correct source based on wp_is_mobile
 *
 * Returns correct array index after testing mobile or desktop devices
 * First array index is mobile, second is desktop
 *
 * @uses wp_is_mobile | https://developer.wordpress.org/reference/functions/wp_is_mobile/
 * @param Array $sources | Array with image urls
 * @return String | correct source based on wp_is_mobile
 *
*/

function get_responsive_source( Array $sources = [] ) : string {
    $source = get_bloginfo('template_url');
    $source = wp_is_mobile() ? $source . $sources[0] : $source . $sources[1];
    return $source;
}

function obj_or_id() {
    if ( is_tax() ) {
        return get_queried_object(); 
    } else {
        return get_queried_object_id();
    }
}

// Truncate string

function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}

function formatTel($string = '') {
    $string = str_replace(['.', '-', ' ', '_', '+'], '', $string);
    return 'tel:' . $string;
}