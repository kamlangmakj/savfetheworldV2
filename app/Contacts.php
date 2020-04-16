<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = "contact";

    public function contactStatus() {
        return $this->belongsTo(ContactStatus::class,"status_contact");
    }
}
