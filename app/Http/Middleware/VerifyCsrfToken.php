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
        "/vodacom",
        "/add_payment_ref",
        "/remove_payment_ref",
        "/add_cellId",
        "/add_ip",
        "/pesapal",
        "/pesapal_save",
        "/call_home"
    ];
}
