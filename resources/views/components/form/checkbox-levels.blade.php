@props([
    'name','options','checked'=>false
])
@php
    $arr=[];
    foreach($checked as $val ){
        array_push($arr, $val->id);
    }
@endphp
@foreach ( $options as $level )
<div class="form-check">
    <input  type="checkbox" name="{{ $name }}"  value="{{ $level['id'] }}" 
    @checked(in_array($level['id'],$arr))
    {{ $attributes->class([
        "form-check-input",
        'is-invalid'=>$errors->has($name),
    ]) }}
    >
    <label class="form-check-label" >
      {{ $level['name'] }}
    </label>
</div>
@endforeach