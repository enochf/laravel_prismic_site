<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSubmission extends Model {
    protected $primaryKey = 'id';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $guarded = [];
}
