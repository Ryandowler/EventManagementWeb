window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createEventForm = document.getElementById('createEventForm');
    if (createEventForm !== null) {
        createEventForm.addEventListener('submit', validateEventForm);
    }

    function validateEventForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }
    
    
    //-------------------------------
    
function validateEventForm(event) {
        var form = event.target;
        var title = form['title'].value;
        var description = form['description'].value;
        var startDate = form['startDate'].value;
        var endDate = form['endDate'].value;
        var time = form['time'].value;
        var maxAttendees = form['maxAttendees'].value;
        var cost = form['cost'].value;
        var managerID = form['managerID'].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (title === "") {
            errors["title"] = "Title cannot be empty\n";
        }
        if (description === "") {
            errors["description"] = "Description cannot be empty\n";
        }
        if (startDate === "") {
            errors["startDate"] = "Dtart Date cannot be empty\n";
        }
        if (endDate === "") {
            errors["endDate"] = "End Date cannot be empty\n";
        }
        if (time === "") {
            errors["time"] = "Time  cannot be empty\n";
        }
        if (maxAttendees === "") {
            errors["maxAttendees"] = "Max Attendees cannot be empty\n";
        }
        if (cost === "") {
            errors["cost"] = "Cost cannot be empty\n";
        }
        if (managerID === "") {
            errors["managerID"] = "managerID cannot be empty\n";
        }
        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");
        console.log(spanElements);    
        console.log(spanElement);
            spanElement.innerHTML = errorMessage;
        }
         if (!valid || !confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }
    //----------------------------------------------------------------------==

    //-------------------------------------------------------------------------
    // define an event listener for the '#createEventForm'
    //-------------------------------------------------------------------------
    var editEventForm = document.getElementById('editEventForm');
    if (editEventForm !== null) {
        editEventForm.addEventListener('submit', validateEventForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteEvent');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this Event?")) {
            event.preventDefault();
        }
    }
     function deleteSelectedEvents(event) {
        var selected = false;
        var deleteCheckBoxes = document.getElementsByClassName("deleteEvents");
        for (var i = 0; i !== deleteCheckBoxes.length; i++) {
            var cb = deleteCheckBoxes[i];
            if (cb.checked) {
                selected = true;
               
            }
        }
        if (!selected || !confirm(" Is the form data correct?")) {
            event.preventDefault();
        }
    }

};
