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

function confirmRedirect() {
    if (confirm("Are you sure you want to delete this record?")) {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "deletelanding.php"

        const params = {};
        const queryString = window.location.search; // Get the query string part of the URL (e.g., ?key=value&anotherKey=anotherValue)
        const urlParams = new URLSearchParams(queryString);

        // console.log(urlParams.get("id"));

        var input1 = document.createElement("input");
        input1.type = "hidden";
        input1.name = "petId";
        input1.value = urlParams.get("id");
        form.appendChild(input1);

        document.body.appendChild(form);
        form.submit();
    }
}

function toEdit() {
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
        input1.value = urlParams.get("id");
        form.appendChild(input1);

        document.body.appendChild(form);
        form.submit();    
    }
}