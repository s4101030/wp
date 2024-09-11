function dropdownDirect() {
    const selectedValue = document.getElementById("navigation").value;

    if (selectedValue == "home"){
        window.location.href = './index.php';
    }
    else if (selectedValue == "pets"){
        window.location.href = './pets.php';
    }    
    else if (selectedValue == "add"){
        window.location.href = './add.php';
    }    
    else if (selectedValue == "gallery"){
        window.location.href = './gallery.php';
    }
}