@php
$name = trim($name, '"');
@endphp
<livewire:get-pokeman-info :name="$name" />
