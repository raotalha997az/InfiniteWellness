@php
    $statusText = \App\Models\Appointment::STATUS_ARR[$row->is_completed] ?? 'Unknown';
    $badgeClass = 'bg-light-info'; // Default color

    switch ($row->is_completed) {
        case 0: // Pending
            $badgeClass = 'bg-light-warning'; // Yellow
            break;
        case 1: // Completed
            $badgeClass = 'bg-light-success'; // Green
            break;
        case 3: // Cancelled
            $badgeClass = 'bg-light-danger'; // Red
            break;
        case 4: // Arrived
            $badgeClass = 'bg-light-primary'; // Blue
            break;
        default:
            $badgeClass = 'bg-light-info'; // Default color
            break;
    }
@endphp

<div class="badge {{ $badgeClass }}">
    <div class="mb-2">
        {{ $statusText }}
    </div>
</div>
