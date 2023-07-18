<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfiLead extends Model {
    protected $primaryKey = 'rfi_id';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $guarded = [];
}
