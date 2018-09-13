<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientsSectionCategory extends Model
{
    protected $table = 'clients_section_categories';

    protected $fillable = ['title'];

    public function pages()
    {
        return $this->hasMany('\App\Models\Page');
    }

    public function clients()
    {
        return  $this->hasMany('App\Models\ClientsSection');
    }

    public function oneClient()
    {
        return $this->hasMany('App\Models\ClientsSection')->first();
    }
}
