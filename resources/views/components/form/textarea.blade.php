@props(['name'])
<textarea class="form-control mt-2" name="{{ $name }}" placeholder="{{ $name }}" style="height:100px"></textarea>
<x-form.error name="{{ $name }}"/>
