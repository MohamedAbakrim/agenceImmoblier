@php
    $value ??= null;
    $label ??= null;
    $class ??= null;
    $name ??= '';
@endphp


<div @class(["form-group", $class])>
    <label for="{{$name}}">{{$label}}</label>
    
    <select name="{{$name}}[]" id="{{$name}}" class="@error($name) is-invalid @enderror" multiple>
        @foreach($options as $x => $y)
            <option @selected($value->contains($x)) value="{{$x}}">{{$y}}</option>
        @endforeach
    </select>
    
    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>