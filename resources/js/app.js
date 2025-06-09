import './bootstrap';
let status = document.getElementById('status')
let statusbox = document.getElementById('statusbox')
statusbox.addEventListener('change', function() {
if(statusbox.checked){
    status.innerText = "Active!"
    status.style.color = "green"
}
else {
    status.innerText = "Inactive!"
    status.style.color = "red"
}
})

