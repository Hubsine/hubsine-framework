<?php

namespace Hubsine\Framework\Http;

use Symfony\Component\HttpFoundation\Request as BaseRequest;

/**
 *
 * Request
 * 
 * @link http://symfony.com/doc/current/components/http_foundation.html
 * 
 * @author Hubsine
 */
class Request extends BaseRequest{
    
    /**
     * Constructor
     * 
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param type $content
     * 
     * @see parent::__construct()
     */
    public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }
}
