@php
    /**
* @var string|null $name
 */
@endphp
<x-alert
    greeting="Hello"
    :$name
    hiddenParam="hidden"
    class="test"
>
    <strong>Whoops!</strong> Something went wrong!
</x-alert>
