<div class="container">
    <h3>Войти</h3>
    <form action="/login" method="post">
        <div class="form-group">
            <label>Имя пользователя</label>
            <input type="text" class="form-control" placeholder="Введите ваш username" name="username">
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="login_btn">Войти</button>
    </form>
</div>
