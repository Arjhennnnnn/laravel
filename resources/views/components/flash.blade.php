@if(session()->has('message'))
<div 
    x-data="{show:true}"
    x-init="setTimeout(() => show = false, 1000)"
    x-show="show"
    class="alert alert-primary text-center" role="alert">
    {{ session('message') }}
</div>
@endif