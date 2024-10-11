@csrf
    <div class="form-group">
        <x-form.input name="name" :value="$book->name" label="Book Name" />
    </div> 
    <div class="form-group">
        <x-form.input name="description" :value="$book->description" label="Book Description" />
    </div> 

    </div>
    <div class="form-group">
        <button type="submit">{{ $button_label ?? 'save' }}</button>
    </div>
 