<?php
/*
Plugin Name: Eracom Articles and Projects
Plugin URI: https://github.com/eracom/
Description: Plugin de fonctionalité pour cumuler les articles, Projets (Jetpack) et Produits (WooCommerce) sur la page des articles.
Version: 0.1
Author: Manuel Schmalstieg
Author URI: http://ms-studio.net
*/

/**
 * add Products to archive pages
 *
 * @param object $query
 * @return object
 */
 
function eracom_mix_articles_projects( $query ) {
        if ( $query->is_year() ) {

           	$query->set( 'post_type', array('post', 'portfolio', 'product'));
            return $query;
            
        } else if ( $query->is_home() && $query->is_main_query() ) {
        
        	$query->set( 'post_type', array('post', 'portfolio', 'product'));
        	return $query;
					
        }
}
add_filter( 'pre_get_posts', 'eracom_mix_articles_projects' );