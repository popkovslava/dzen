<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = ['fileName', 'filePath', 'fileUrl', 'send_id'];

    public function sends()
    {
        return $this->belongsTo('\App\Models\Send');
    }
}
