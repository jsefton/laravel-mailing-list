<?php
return [
    /**
     * Enable API for mailing lists to allow creation
     */
    'api' => env('MAILING_LIST_API', true),

    /**
     * Route for API requests (only registered if api is enabled)
     */
    'route' => '/api/mailing-list'
];
