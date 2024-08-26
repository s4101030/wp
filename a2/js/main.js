function dropdownDirect() {
    const selectedValue = document.getElementById("navigation").value;

    if (selectedValue == "home"){
        window.location.href = './index.html';
    }
    else if (selectedValue == "pets"){
        window.location.href = './pets.html';
    }    
    else if (selectedValue == "add"){
        window.location.href = './add.html';
    }    
    else if (selectedValue == "gallery"){
        window.location.href = './gallery.html';
    }
}