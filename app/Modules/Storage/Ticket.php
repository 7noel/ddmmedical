<?php

namespace App\Modules\Storage;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

}
