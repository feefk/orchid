<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    'user' => App\Models\User::class,

    /*
    |--------------------------------------------------------------------------
    | jwt authentication secret
    |--------------------------------------------------------------------------
    |
    | don't forget to set this in your .env file, as it will be used to sign
    | your tokens. a helper command is provided for this:
    | `php artisan jwt:secret`
    |
    | note: this will be used for symmetric algorithms only (hmac),
    | since rsa and ecdsa use a private/public key combo (see below).
    |
    */

    'secret' => env('JWT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | jwt authentication keys
    |--------------------------------------------------------------------------
    |
    | the algorithm you are using, will determine whether your tokens are
    | signed with a random string (defined in `jwt_secret`) or using the
    | following public & private keys.
    |
    | symmetric algorithms:
    | hs256, hs384 & hs512 will use `jwt_secret`.
    |
    | asymmetric algorithms:
    | rs256, rs384 & rs512 / es256, es384 & es512 will use the keys below.
    |
    */

    'keys' => [

        /*
        |--------------------------------------------------------------------------
        | public key
        |--------------------------------------------------------------------------
        |
        | a path or resource to your public key.
        |
        | e.g. 'file://path/to/public/key'
        |
        */

        'public' => env('JWT_PUBLIC_KEY'),

        /*
        |--------------------------------------------------------------------------
        | private key
        |--------------------------------------------------------------------------
        |
        | a path or resource to your private key.
        |
        | e.g. 'file://path/to/private/key'
        |
        */

        'private' => env('JWT_PRIVATE_KEY'),

        /*
        |--------------------------------------------------------------------------
        | passphrase
        |--------------------------------------------------------------------------
        |
        | the passphrase for your private key. can be null if none set.
        |
        */

        'passphrase' => env('JWT_PASSPHRASE'),

    ],

    /*
    |--------------------------------------------------------------------------
    | jwt time to live
    |--------------------------------------------------------------------------
    |
    | specify the length of time (in minutes) that the token will be valid for.
    | defaults to 1 hour.
    |
    | you can also set this to null, to yield a never expiring token.
    | some people may want this behaviour for e.g. a mobile app.
    | this is not particularly recommended, so make sure you have appropriate
    | systems in place to revoke the token if necessary.
    |
    */

    'ttl' => env('JWT_TTL', 20160),

    /*
    |--------------------------------------------------------------------------
    | refresh time to live
    |--------------------------------------------------------------------------
    |
    | specify the length of time (in minutes) that the token can be refreshed
    | within. i.e. the user can refresh their token within a 2 week window of
    | the original token being created until they must re-authenticate.
    | defaults to 2 weeks.
    |
    | you can also set this to null, to yield an infinite refresh time.
    | some may want this instead of never expiring tokens for e.g. a mobile app.
    | this is not particularly recommended, so make sure you have appropriate
    | systems in place to revoke the token if necessary.
    |
    */

    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160),

    /*
    |--------------------------------------------------------------------------
    | jwt hashing algorithm
    |--------------------------------------------------------------------------
    |
    | specify the hashing algorithm that will be used to sign the token.
    |
    | see here: https://github.com/namshi/jose/tree/master/src/namshi/jose/signer/openssl
    | for possible values.
    |
    */

    'algo' => env('JWT_ALGO', 'HS256'),

    /*
    |--------------------------------------------------------------------------
    | required claims
    |--------------------------------------------------------------------------
    |
    | specify the required claims that must exist in any token.
    | a tokeninvalidexception will be thrown if any of these claims are not
    | present in the payload.
    |
    */

    'required_claims' => [
        'iss',
        'iat',
        'exp',
        'nbf',
        'sub',
        'jti',
    ],

    /*
    |--------------------------------------------------------------------------
    | persistent claims
    |--------------------------------------------------------------------------
    |
    | specify the claim keys to be persisted when refreshing a token.
    | `sub` and `iat` will automatically be persisted, in
    | addition to the these claims.
    |
    | note: if a claim does not exist then it will be ignored.
    |
    */

    'persistent_claims' => [
        // 'foo',
        // 'bar',
    ],

    /*
    |--------------------------------------------------------------------------
    | blacklist enabled
    |--------------------------------------------------------------------------
    |
    | in order to invalidate tokens, you must have the blacklist enabled.
    | if you do not want or need this functionality, then set this to false.
    |
    */

    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),

    /*
    | -------------------------------------------------------------------------
    | blacklist grace period
    | -------------------------------------------------------------------------
    |
    | when multiple concurrent requests are made with the same jwt,
    | it is possible that some of them fail, due to token regeneration
    | on every request.
    |
    | set grace period in seconds to prevent parallel request failure.
    |
    */

    'blacklist_grace_period' => env('JWT_BLACKLIST_GRACE_PERIOD', 0),

    /*
    |--------------------------------------------------------------------------
    | providers
    |--------------------------------------------------------------------------
    |
    | specify the various providers used throughout the package.
    |
    */

    'providers' => [

        /*
        |--------------------------------------------------------------------------
        | jwt provider
        |--------------------------------------------------------------------------
        |
        | specify the provider that is used to create and decode the tokens.
        |
        */


        'jwt' => Tymon\JWTAuth\Providers\JWT\Namshi::class,

        /*
        |--------------------------------------------------------------------------
        | Authentication Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to authenticate users.
        |
        */

        'auth' => Tymon\JWTAuth\Providers\Auth\Illuminate::class,

        /*
        |--------------------------------------------------------------------------
        | Storage Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to store tokens in the blacklist.
        |
        */

        'storage' => Tymon\JWTAuth\Providers\Storage\Illuminate::class,

    ],

];
