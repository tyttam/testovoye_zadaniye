<div class="container">
    <h3>Новая задача</h3>
    <form action="/add-new-task" method="post">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" placeholder="Введите ваше имя" name="name">
        </div>
        <div class="form-group">
            <label>Email адрес</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email" name="mail">
        </div>
        <div class="form-group">
          <label>Текст задачи</label>
          <textarea class="form-control" rows="3" name="task"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="add_btn">Создать</button>
    </form>
</div>
