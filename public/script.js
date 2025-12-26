let no = 1;

function addUser() {
    const name  = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const role  = document.getElementById('role').value;
    const error = document.getElementById('error');

    error.textContent = '';

    if (!name || !email) {
        error.textContent = 'Nama dan email wajib diisi';
        return;
    }

    const table = document.getElementById('userTable');
    const row = table.insertRow();

    row.innerHTML = `
        <td>${no++}</td>
        <td>${name}</td>
        <td>${email}</td>
        <td>${role}</td>
    `;

    fetch('/api/notify', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ name, email, role })
    });

    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
}
