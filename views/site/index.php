<div class="container-fluid">
    <h1 class="float-left">Задачи</h1>
    <a href="/create-task" style="margin-top:20px;color:white;cursor:pointer;" class="btn btn-dark float-right">Создать задачу</a>
    <div class="table-responsive">
        <table id="task-table" class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Статус</th>
                    <th scope="col">Имя</th>
                    <th scope="col">mail</th>
                    <th scope="col">Задача</th>
                    <?= (!empty($_SESSION['role']) && $_SESSION['role'] == 'admin') ? '<th scope="col">Управление</th>' : '' ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <?= $task['status'] == 0 ? '<th class="text-danger">Не выполнено</th>' : '<th class="text-success">Выполнено</th>' ?>
                        <td><?= $task['u_name'] ?></td>
                        <td><?= $task['mail'] ?></td>
                        <td><?= $task['task'] ?></td>
                        <?= (!empty($_SESSION['role']) && $_SESSION['role'] == 'admin') ? '<td><a href="/update-task/id=' .  $task['id'] . '" class="btn btn-outline-primary">Редактировать</a></td>' : '' ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
