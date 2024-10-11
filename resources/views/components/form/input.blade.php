@props([
    'type'=>'text','name','value' =>'' ,'label' => false           // if i use $attributes must define @ props() becuse $attributes print all variables 
])
@if ($label)    
    <label for="">{{ $label }}</label>
@endif 

<input type="{{ $type }}" name="{{ $name }}"    value="{{ @old($name,$value) }}"

    {{ $attributes->class([ 
        "form-control",
        'is-invalid'=>$errors->has($name),
    ]) }}
    >
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror