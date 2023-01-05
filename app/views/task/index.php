<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="/task/create">Nova tarefa</a></li>
                </ul>
            </div>
            <div class="col-md-12">
                <table class="table ">
                    <tr>
                        <td>ID</td>
                        <td>Titulo</td>
                        <td>Categoria</td>
                        <td>Status</td>
                        <td>Proprietário</td>
                    </tr>
                    <?php foreach ($data['tasks'] as $task) { ?>
                        <tr>
                            <td><?= $task['id'] ?></td>
                            <td><?= $task['title'] ?></td>
                            <td><?= $task['category'] ?></td>
                            <td><?= $task['status'] ?></td>
                            <td><?= $task['users_id'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>