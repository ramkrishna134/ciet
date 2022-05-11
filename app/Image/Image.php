<?php

namespace App\Image;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\Image as InterventionImage;

class Image extends Controller
{

    public static function routes(){

        Route::prefix('img')->group(function(){

            Route::get('/resize/w{width?}/h{height?}/{path?}', '\App\Image\Image@resize')->where(['width' => '[0-9]+', 'height' => '[0-9]+', 'path' => '.*']);
            Route::get('/resize/h{height?}/w{width?}/{path?}', '\App\Image\Image@resize')->where(['width' => '[0-9]+', 'height' => '[0-9]+', 'path' => '.*']);
            Route::get('/resize/w{width?}/{path?}', '\App\Image\Image@resize')->where(['width' => '[0-9]+', 'path' => '.*']);
            Route::get('/resize/h{height?}/{path?}', '\App\Image\Image@resize')->where(['height' => '[0-9]+', 'path' => '.*']);


            Route::get('/crop/w{width?}/h{height?}/{path?}', '\App\Image\Image@crop')->where(['width' => '[0-9]+', 'height' => '[0-9]+', 'path' => '.*']);
            Route::get('/crop/h{height?}/w{width?}/{path?}', '\App\Image\Image@crop')->where(['width' => '[0-9]+', 'height' => '[0-9]+', 'path' => '.*']);
            Route::get('/crop/w{width?}/{path?}', '\App\Image\Image@crop')->where(['width' => '[0-9]+', 'path' => '.*']);
            Route::get('/crop/h{height?}/{path?}', '\App\Image\Image@crop')->where(['height' => '[0-9]+', 'path' => '.*']);

        });

    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function resize( Request $request ){
        return $this->manipulate( $request, 'resize' );
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function crop( Request $request ){
        return $this->manipulate( $request, 'fit' );
    }


    /**
     * @param Request $request
     * @param $method [resize|fit]
     * @return mixed
     */
    protected function manipulate( Request $request, $method ){
        $params = array_merge([
            'width' => null,
            'height' => null,
            'path' => null,
        ], $request->route()->parameters());

        $params['path'] = '' . $params['path'];

        $image = InterventionImage::cache(function($image) use ($params, $method) {
            /** @var \Intervention\Image\Image $image */
            return $image->make($params['path'])->$method($params['width'], $params['height'], function( $constraint ){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }, 60 * 24 * 30, true);

        /** @var \Intervention\Image\Image $image */
        return $image->response()
            ->setLastModified(now()->subDays(15))
            ->setMaxAge(60 * 60 * 24 * 30)
            ->setPublic();
    }


    public static function url( $url, $params ){

        if( empty( $url ) ) return $url;

        foreach ( $params as $method => $param ){

            $p = [
                'w' => null,
                'h' => null,
            ];

            if( is_array( $param ) AND !empty( $param ) ){
                $p['w'] = array_shift( $param );
                if( !empty( $param ) ){
                    $p['h'] = array_shift( $param );
                }
            }elseif (is_scalar( $param )){
                $p['w'] = $p['h'] = intval( $param );
            }

            $segments = [];
            foreach ( $p as $key => $value ){
                if( !empty( $value ) ){
                    $segments[] = "$key$value";
                }
            }

            $url = ltrim( str_replace( url('/'), '', $url ), "/" );
            $url = url( "img/$method/" . implode('/', $segments) . '/' . $url );
            $url = str_replace(' ', '%20', $url);

            return $url;
        }

        return null;
    }

}
