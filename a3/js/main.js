// function dropdownDirect() {
//     const selectedValue = document.getElementById("navigation").value;

//     if (selectedValue == "home"){
//         window.location.href = './index.php';
//     }
//     else if (selectedValue == "pets"){
//         window.location.href = './pets.php';
//     }    
//     else if (selectedValue == "add"){
//         window.location.href = './add.php';
//     }    
//     else if (selectedValue == "gallery"){
//         window.location.href = './gallery.php';
//     }
// }

function confirmRedirect(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "delete.php"

        const params = {};
        const queryString = window.location.search; // Get the query string part of the URL (e.g., ?key=value&anotherKey=anotherValue)
        const urlParams = new URLSearchParams(queryString);

        // console.log(urlParams.get("id"));

        var input1 = document.createElement("input");
        input1.type = "hidden";
        input1.name = "petId";
        input1.value = id;
        form.appendChild(input1);

        document.body.appendChild(form);
        form.submit();
    }
}

function toEdit(id) {
    if (confirm("Are you sure you want to edit this record?")) {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "edit.php"

        const params = {};
        const queryString = window.location.search; // Get the query string part of the URL (e.g., ?key=value&anotherKey=anotherValue)
        const urlParams = new URLSearchParams(queryString);

        // console.log(urlParams.get("id"));

        var input1 = document.createElement("input");
        input1.type = "hidden";
        input1.name = "petId";
        input1.value = id;
        form.appendChild(input1);

        document.body.appendChild(form);
        form.submit();
    }
}

function hideall() {
    var hideall = document.getElementsByClassName("gallerydiv");
    // console.log(hideall)

    for (var i = 0; i < hideall.length; i++) {
        // hideall[i].style.visibility = 'hidden';
        hideall[i].style.display = 'none';
    }
}

function showneeded(selectedValue) {
    var selection = "[data-type=\"" + selectedValue + "\"]";

    // console.log(selection);

    var hideall = document.querySelectorAll("[id='gallerydiv']");
    // console.log(hideall)

    for (var i = 0; i < hideall.length; i++) {
        // hideall[i].style.visibility = 'hidden';
        hideall[i].style.display = 'none';
    }

    var showthese = document.querySelectorAll(selection)
    // console.log(showthese)
    for (var i = 0; i < showthese.length; i++) {
        // showthese[i].style.visibility = 'visible';
        // showthese[i].style.display = 'block';
        showthese[i].style.setProperty('display', 'block', 'important');
    }
}

function showall() {
    var hideall = document.getElementsByClassName("gallerydiv");
    // console.log(hideall)

    for (var i = 0; i < hideall.length; i++) {
        // hideall[i].style.visibility = 'visible';
        hideall[i].style.display = 'block';
        // hideall[i].style.setProperty('visibility', 'visible', 'important');
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

function typeselect() {
    const selectedValue = document.getElementById("typeselector").value;

    // console.log(selectedValue);

    if (selectedValue != "") {
        hideall();
        sleep(50000)
        showneeded(selectedValue);
    }
    else {
        showall();
    }
}