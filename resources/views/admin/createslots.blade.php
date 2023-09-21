<form id="create_slots_form">
    <div class="row mt-4">
        <hr class="pb-4">
        
            @php $i = 1; @endphp
            @foreach ($slots as $slot=>$val)
                <div class="col">
                    <input type="checkbox" class="btn-check" name="slots[]" value="{{ $slot }}" id="btn-check-{{ $i }}-outlined" @if($val == 1) checked @endif autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btn-check-{{ $i }}-outlined">{{ $slot }}</label><br>
                </div>
                @php $i++; @endphp
            @endforeach
        
    </div>
    <input type="hidden" name="date" value="{{ $date }}">
</form>
<div class="row text-start mt-5">
    <div class="col">
        <a href="" id="create_slots_btn" data-url="{{ route('admin.slotcreate') }}" class="btn btn-primary">Save</a>
    </div>
</div>