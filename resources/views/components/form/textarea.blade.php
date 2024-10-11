@props([
    'name','value' =>'' ,'label' => false           // if i use $attibutes must define @ props() becuse $attibutes print all variables 
])
@if ($label)    
    <label for="">{{ $label }}</label>
@endif


<textarea  name="{{ $name }}"  

    {{ $attributes->class([
        "form-control",
        'is-invalid'=>$errors->has($name),
    ]) }}
    >
 {{ @old($name,$value) }}
</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror