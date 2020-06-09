<?php
    // On ajoute le title à nos pages
    function portfolio_support(){
        add_theme_support('title-tag');
    }

    function portfolio_assets() {
        wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
        // Chargement du fichier css
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/_home.css', array(), NULL, NULL);
        wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
        wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
        wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
    }

    // On définit notre séparateur de title
    function portfolio_title_separator(){
        return '|';
    }

    // On modifie les parties du title
    function portfolio_document_title_parts($title){
    // Supprimer la tagline avec title par def
       unset($title["tagline"]);
    // Rajouter une nouvelle entrée à la tagline
       $title["demo"] = 'Salut';
    //    echo $title["demo"];
       return $title;
    }

    // Quand la page est chargée
    add_action('after_setup_theme', 'portfolio_support');
    // On charge bootstrap
    add_action('wp_enqueue_scripts', 'portfolio_assets');
    // On charge les filtre
    add_filter('document_title_separator', 'portfolio_title_separator');
    add_filter('document_title_parts', 'portfolio_document_title_parts');
?>