<?php

namespace App\Domain\Invoice\Livewire;

use App\Domain\Invoice\Models\Invoice;
use App\Domain\Invoice\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Invoices extends Component
{
    public Invoice $invoice;
    public $details = [];

    protected $rules = [
        'invoice.name' => 'required',
        'invoice.total' => 'required|numeric',
        'details.*.description' => 'required',
    ];

    public function mount()
    {
        $this->invoice = new Invoice;
        
    }
    public function render()
    {
        return view('livewire.invoices', [
            'invoices' => Invoice::all()
        ]);
    }

    public function add()
    {
        $this->details[] = new InvoiceDetail;
    }

    public function edit(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->details = $invoice->invoiceDetails;
    
    }
    
    public function store()
    {
       
        $this->validate();
   
        DB::transaction( function ()
        {
           
            $this->invoice->save();

            foreach($this->details as $detail){
               
                if($detail instanceof InvoiceDetail){
                    $detail->save();
                }else{
                    $this->invoice->invoiceDetails()->create($detail);
                }
               
            }

            $this->invoice = new Invoice;
            $this->details = [];

        });
       
    }
}
