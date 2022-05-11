<?php
if( !function_exists('imageUrl') ){
    function imageUrl( $url, $options = [] ){
        return \App\Image\Image::url( $url, $options );

        // dd($url);
    }
}
