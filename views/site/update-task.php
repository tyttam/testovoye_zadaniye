<div class="container">
    <h3>Обновить задачу</h3>
    <form action="/update-task/id=<?= $task_upd['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $task_upd['id'] ?>">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" placeholder="Введите ваше имя" name="name" value="<?= $task_upd['u_name'] ?>">
        </div>
        <div class="form-group">
            <label>Email адрес</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Введите email" name="mail" value="<?= $task_upd['mail'] ?>">
        </div>
        <div class="form-group">
          <label>Текст задачи</label>
          <textarea class="form-control" rows="3" name="task"><?= $task_upd['task'] ?></textarea>
        </div>
        <div class="form-group">
          <label>Статус задачи</label>
          <select class="form-control" name="status">
            <option value="0">Не выполнено</option>
            <option value="1">Выполнено</option>
          </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="update_btn">Обновить</button>
        </div>
    </form>
</div>
