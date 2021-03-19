<?php

namespace App\Domain\Invoice\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
