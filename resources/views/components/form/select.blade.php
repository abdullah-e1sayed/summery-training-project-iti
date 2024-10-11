@props([
    'name','options','selecte'=>false,'label' => false
])
@if ($label)    
<label for="">{{ $label }}</label>
@endif
<select
    name="{{ $name }}"
    {{ 
    $attributes->class([
        'form-control',
        'form-select',
        'is-invalid'=>$errors->has($name)
    ]) ;
    }}
 
 >
 <option value="" >Choose</option>
 {{-- @checked(@old($name,$checked)== $value) --}}

    @foreach ($options as $option)
            <option value="{{ $option['id'] }}" @selected(request($name,$selecte)==$option['id'])>{{ $option['name'] }}</option>        
    @endforeach

</select>
{{-- <x-form.validation-feedback :name="$name"/> --}}