$(function(){
    //CSRF token for ajax requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#check_btn').on('click',function(e){
        e.preventDefault();

        _date = $('#slot_date').val();
        _url = $(this).data('url');

        if(_date)
        {
            $.post(_url,{date:_date},function(data){
                $('#results').html(data.view);
            });
        }
        else
        {
            alert('Please Select a Date');
        }
    });

    $('#results').on('click','#create_slots_btn', function(e){
        e.preventDefault();

        _url = $(this).data('url');
        _form = $('#results').find('form').serialize();

        $.post(_url,_form,function(data){
            if(data.status == 'success')
            {
                alert('Saved Successfully!');
            }
        });

    });


    $('#check_reserve_btn').on('click',function(e){
        e.preventDefault();

        _date = $('#reserve_date').val();
        _url = $(this).data('url');

        if(_date)
        {
            $.post(_url,{date:_date},function(data){
                $('#reservations').html(data.view);
            });
        }
        else
        {
            alert('Please Select a Date');
        }
    });

    $('#reservations').on('click','.reserve_link', function(e){
        
        _this = $(this);
        _val = _this.val();
        _url = _this.data('url');
        _status = _this.data('status');
        _new_status = _status == 0 ? 1 : 0;

        _this.prop('disabled',true);

        _message = $('#reservations').find('#success_msg');

        $.post(_url,{id:_val,status:_status},function(data){
            _this.data('status',_new_status);
            _this.prop('disabled', false);

            _message.removeClass('d-none');
            setTimeout(() => {
                _message.addClass('d-none');
            }, 2000);
        });

    });

    $('#my_reservation').on('click','.del_res', function(e){
        e.preventDefault();
        _this = $(this);
        _id = $(this).data('id');
        _url = $(this).data('url');

        if(confirm('Are you sure?'))
        {
            $.post(_url,{id:_id},function(data){
                if(data.status == 'success')
                {                    
                    window.location.reload();                    
                }
            });
        }

        
    });

});