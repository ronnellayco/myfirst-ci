<form method="POST" action="/dashboard/admin/login">
    <div>
        <label>Username: </label>
        <input type="text" name="username" value="{username}"/>
    </div>
    <div>
        <label>Password: </label>
        <input type="password" name="password" value="{password}"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login" />
    </div>
    <div>
        {error}
    </div>
</form>