<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $table = 'bug';

    const SUGGEST = 'Suggest';
    const EMERGENCY = 'Emergency';
    const DANGER = 'Danger';
    const ERROR = 'Error';
    const WARNING = 'Warning';
    const INVALID = 'Invalid';

    const COLOR_SUGGEST = '159818';
    const COLOR_EMERGENCY = 'FC2929';
    const COLOR_DANGER = 'EB6420';
    const COLOR_ERROR = 'FBCA04';
    const COLOR_WARNING = '0052CC';
    const COLOR_INVALID = '5319E7';
}
