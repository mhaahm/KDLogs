<select class="form-control" name="{{ $name }}">
    @foreach($list as $k => $el)
        @php
            $selected = (isset($default[$name]) && $default[$name] == $k) ? 'selected' :'';
        @endphp
        <option value="{{ $k }}" {{ $selected }}> {{ $el }} </option>
    @endforeach
</select>
