<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model{

    use HasFactory;
    protected $guarded = [];

    public function type(): BelongsTo{
        return $this->belongsTo(Doctype::class);
    }

    public function columns(): BelongsToMany{
        return $this->belongsToMany(Column::class)->withPivot('text')->withTimestamps();
    }
    
}
