<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">User Management</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah User</div>
                <div class="card-body">
                    <input class="form-control mb-2" id="name" placeholder="Nama">
                    <input class="form-control mb-2" id="email" placeholder="Email">
                    <select class="form-select mb-2" id="role">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                    <button class="btn btn-primary w-100" onclick="addUser()">Tambah</button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th><th>Nama</th><th>Email</th><th>Role</th>
                    </tr>
                </thead>
                <tbody id="userTable"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
let id = 1;

function addUser() {
    const name  = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const role  = document.getElementById('role').value;

    if (!name || !email) {
        alert('Nama dan Email wajib diisi');
        return;
    }

    fetch('/notify', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ name, email })
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === 'success') {
            document.getElementById('userTable').innerHTML += `
                <tr>
                    <td>${id++}</td>
                    <td>${name}</td>
                    <td>${email}</td>
                    <td>${role}</td>
                </tr>
            `;
            alert('User ditambahkan & email terkirim');
        } else {
            alert('Gagal mengirim email');
        }
    })
    .catch(() => alert('Server error'));
}
</script>

</body>
</html>
