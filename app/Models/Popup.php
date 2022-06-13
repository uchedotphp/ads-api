<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        "", "idem", "data",
    ];

    protected $casts = [
        "data" => "json",
    ];

    public function new(array $data): Popup
    {
        if (empty($data["idem"])) {
            $data["idem"] = uniqid();
        }

        return $this->create($data);
    }
}
