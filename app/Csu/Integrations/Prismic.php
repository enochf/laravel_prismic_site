<?php
namespace App\Csu\Integrations;

use Prismic\Api;
use Prismic\Predicates;

class Prismic
{
    protected $prismic;

    public function __construct()
    {
        $this->prismic = Api::get($this->prismic);
    }

    public function getPageByPath($path) {
        return $this->prismic->query(Predicates::at('my.dev_content_page.path', '/t1est-page-for-d'));
    }
}
