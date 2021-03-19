<div>
    <form action="#" wire:submit.prevent="store">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" wire:model.defer="invoice.name">
        </div>
        <div>
            <label for="">Total</label>
            <input type="text" wire:model.defer="invoice.total">
        </div>
        <div>
            <button type="button" wire:click="add">Add</button>
            @foreach ($details as $index => $detail)
            <div wire:key="post-field-{{ $index }}">
                <input type="text" wire:model="details.{{ $index }}.description">
                @error('details.'. $index . '.description') <span class="error">{{ $message }}</span> @enderror
            </div>
        @endforeach
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>

    @foreach ($invoices as $invoice)
        <div>
            {{ $invoice->name }} - {{ $invoice->total }} <button wire:click="edit({{ $invoice->id }})">Edit</button>
        </div>
    @endforeach
</div>
