// delete function
function deleteData(id) {
    let idMed = id;
    let url = '{{ route("medicaments.destroy", ":id") }}';
    url = url.replace(':id', idMed);
    $("#deleteMedsForm").attr('action', url);

}
//submit form function
function formSubmit()
{
    $("#deleteMedsForm").submit();
}
