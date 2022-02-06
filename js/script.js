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

function validateDate(event) {
    event.preventDefault();
    let form = document.getElementById('date-form');
    let dateValue = document.getElementById('date').value;
    let today = new Date();

    dateValue  = dateValue + ' 00:00:00';
    const enteredDate = new Date(dateValue);

    if (enteredDate > today) {
        alert('Date not valid');
    }else {
        form.submit();
    }
}

function displayOptions(){
    let checkBoxes = document.getElementById('disply-clicked');
    checkBoxes.style.display = 'block';
}

function hideOptions(){
    let checkBoxes = document.getElementById('disply-clicked');
    checkBoxes.style.display = 'none';
}