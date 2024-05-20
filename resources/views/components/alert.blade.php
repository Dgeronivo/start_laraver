@php
    /**
* @var \Illuminate\View\ComponentAttributeBag $attributes
 */
@endphp
<div>
    <h3 {{ $attributes->toHtml() }} style="color: red;">Alert</h3>
    {{ $slot }}
    @if(!empty($name))
        <div>{{$greeting}} {{ $name }}</div>
    @endif
</div>
