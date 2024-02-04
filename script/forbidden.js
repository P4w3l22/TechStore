if ("<?php echo $forbidden; ?>") {
    // toggleOverlay()

    alert("Ta strona jest dostępna jedynie dla administratora!")
    window.location.href = "../log/login.php"
}

// function toggleOverlay() {
//     var overlay = document.getElementById('test');
//     overlay.style.display = "none"
// }