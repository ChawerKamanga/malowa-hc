window.setTimeout("closeP();", 4000);

function closeP() {
    let collection = document.getElementsByClassName("message");

    for (let i = 0; i < collection.length; i++) {
        collection[i].style.display = "none";
    }
}

function confirmDelete($id) {
    let deleteForm = document.getElementById('delete-form-' + $id);
    if (confirm('Are you sure you want to delete?')) {
        deleteForm.submit();
    }else{
        console.log('No');
    }
}
