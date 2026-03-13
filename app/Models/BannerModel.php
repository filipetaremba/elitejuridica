<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'image',
        'label',
        'titulo',
        'subtitulo',
        'cta_texto',
        'cta_url'
    ];

    protected $useTimestamps = true;
}