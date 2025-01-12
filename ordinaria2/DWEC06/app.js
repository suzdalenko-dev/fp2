var USERS   = [];
var USER_ID = 0;
var THEME   = 'light';

/* validate email */
function isValidEmail(email) {
    // Regular expression for validating email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/ * Función para mostrar la tabla de usuarios */
function showTableUsers(all){
    document.getElementById('table_users').innerHTML = '';
    let tableContent = '';
    all.forEach(user => {
        console.log(user)
        tableContent += `<tr><td>${user.name}</td><td>${user.email}</td><td><button onclick="editUser(${user.id})">Editar</button><button onclick="deleteUser(${user.id})">Eliminar</button></td></tr>`;	
    });
    document.getElementById('table_users').innerHTML = tableContent;
}
/* Función para editar usuario */
function editUser(id){
    let user = USERS.find(u => u.id === id);
    document.getElementById('name').value = user.name;
    document.getElementById('email').value = user.email;
    USERS = USERS.filter(u => u.id !== id);
    document.getElementById('message').innerHTML = 'Editando usuario';
}
/* Función para eliminar usuario */
function deleteUser(id){
    USERS = USERS.filter(u => u.id !== id);
    showTableUsers(USERS);
    document.getElementById('user-count').innerHTML = 'Total de usuarios: '+USERS.length;
    document.getElementById('message').innerHTML = 'Usuario eliminado correctamente';
}

/* Evento para agregar usuario */
document.getElementById('button_add').addEventListener('click', function() {
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    if(!name || !email){
        alert('Please enter name and email');
        return;
    }
    if(!isValidEmail(email)){
        alert('Please enter a valid email');
        return;
    }
    USERS.push({name:name, email:email, id:USER_ID++});
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').innerHTML = 'Usuario añadido correctamente';

    showTableUsers(USERS);
    document.getElementById('user-count').innerHTML = 'Total de usuarios: '+USERS.length;
});

/* Evento para limpiar todos los usuarios */
document.getElementById('clear-all').addEventListener('click', function() {
    USERS = [];
    showTableUsers(USERS);
    document.getElementById('user-count').innerHTML = 'Total de usuarios: '+USERS.length;
    document.getElementById('message').innerHTML = 'Usuarios eliminados correctamente';
});

/* Evento para limpiar mensaje */
setInterval(() => {
    document.getElementById('message').innerHTML = '';
}, 11000);


/* Evento para cambiar el tema */
document.getElementById('toggle-theme').addEventListener('click', function() {
    let inputsAndButtons = document.querySelectorAll('input, button');
    if (THEME == 'light') {
        THEME = 'dark';
        document.body.style.backgroundColor = '#333';
        document.body.style.color = '#fff';

        inputsAndButtons.forEach(el => {
            el.style.backgroundColor = '#444'; 
            el.style.color = '#fff';
            el.style.borderColor = '#555'; 
        });
    } else {
        THEME = 'light';
        document.body.style.backgroundColor = '#fff';
        document.body.style.color = '#333';

        inputsAndButtons.forEach(el => {
            el.style.backgroundColor = '#fff'; 
            el.style.color = '#333'; 
            el.style.borderColor = '#ccc'; 
        });
    }
});