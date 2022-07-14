@switch($status)
    @case('complete')
        <span class="text-success">مكتمل</span>
    @break

    @case('cancelled')
        <span class="text-danger">ملغي</span>
    @break

    @case('incomplete')
        <span class="text-warning">غير مكتمل</span>
    @break
@endswitch
{{-- ['complete', 'cancelled','incomplete'] --}}
