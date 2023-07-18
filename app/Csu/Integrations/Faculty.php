<?php
namespace App\Csu\Integrations;

use Illuminate\Support\Facades\Http;

class Faculty {

    protected $url = 'https://faculty.csuglobal.edu/api/v1/credentials';

    public function __construct() {

    }

    public function get() {

        return Http::get($this->url);
        
    }

}
