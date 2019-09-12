<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadProfile
 * @package App
 */
class DownloadProfile extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'pasport', 'diplom', 'ident_code', 'diplom_compl',
        'certificate', 'health_book', 'foto'
    ];

}
