function validateForm() {
    var username = document.getElementById('username').value;
    if (username === '') {
        alert('Username cannot be empty');
        return false;
    }
    // Additional validation logic
}
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
function toggleElement() {
    var element = document.getElementById('myElement');
    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('result').innerHTML = this.responseText;
    }
};
xhr.open('GET', 'ajax-data.php', true);
xhr.send();
