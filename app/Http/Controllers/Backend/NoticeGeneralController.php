<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use App\Http\Controllers\Backend\NoticeController;

class NoticeGeneralController extends NoticeController
{
    /**
     * Set the resource and model names.
     */
    function __construct()
    {
        $this->resource = 'notice-general';
        $this->model = Notice::class;
        parent::__construct();
    }
}
