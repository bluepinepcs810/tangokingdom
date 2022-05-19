<?php

namespace Botble\Contact\Models;

use Botble\Base\Models\BaseModel;

class ContactSubject extends BaseModel 
{
    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}