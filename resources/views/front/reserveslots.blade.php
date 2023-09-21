
<div class="row mt-4">
    <hr class="pb-4">    
        @if($slots->count() > 0)
            @foreach ($slots as $slot)
                @if($slot->reservation)
                    <div class="col">
                        <input type="checkbox" class="btn-check" name="slots[]" value="{{ $slot->id }}" id="btn-check-{{ $slot->id }}-outlined" checked disabled autocomplete="off">
                        <label class="btn btn-outline-secondary" for="btn-check-{{ $slot->id }}-outlined">{{ Str::substr($slot->time, 0 , 5) }}</label><br>
                    </div>
                @else
                    <div class="col">
                        <input type="checkbox" class="btn-check reserve_link" data-url="{{ route('front.save') }}" data-status="0" name="slots[]" value="{{ $slot->id }}" id="btn-check-{{ $slot->id }}-outlined" @if($slot->reservation) checked @endif autocomplete="off">
                        <label class="btn btn-outline-success" for="btn-check-{{ $slot->id }}-outlined">{{ Str::substr($slot->time, 0 , 5) }}</label><br>
                    </div>
                @endif
            @endforeach  
        @else
            <div class="alert alert-warning py-2 text-center" role="alert">
                No Slots Available
            </div>
        @endif  
</div>

<div id="success_msg" class="row mt-4 d-none">
    <div class="alert alert-success py-2 text-center" role="alert">
        Updated Successfully!
    </div>
</div>