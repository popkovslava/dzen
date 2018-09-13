<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkClientCount extends Model
{
    protected $table = 'link_client_counts';
    protected $fillable = ['link_id', 'clients_section_id'];
}
