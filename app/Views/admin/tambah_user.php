<form action="/user/store" method="post">
    <div>
        <label for="kode_admin">Kode Admin</label>
        <input type="text" name="kode_admin" id="kode_admin" required>
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>
    </div>
    <div>
        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <button type="submit">Simpan</button>
</form>
