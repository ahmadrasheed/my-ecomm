<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [

      '/products/add',
      'products',
      '/categories/add',
      '/categories',
      '/category-products/{id}',
      '/products/add',
      '/products-search',
      '/products-search_index',
      '/apriori',
      'google-analytics-summary',
      '/qr',
      '/getQR',
      '/profile',
      '/logout',
      '/signin',
      '/signup',
      '/checkout',
      '/shopping-cart',
      '/remove/{id}',
      '/add-to-cart/{id}',
      '/product-details/{id}',
    




        //
    ];
}
