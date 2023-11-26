//destroy
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//function delete section
function removeRow(id, url){
    if(confirm('Are you sure you want to delete?')){
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: {id},
            url: 'destroy',
            success: function (result){
                if(result.error === false){
                    alert(result.message);
                    //reload website
                    location.reload();
                } else {
                    alert('trying again');
                }
            }
        })
    }
}