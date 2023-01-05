<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="post" action="/task/createTask" class="row g-3 needs-validation" novalidate> 
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validTitulo" class="form-label">Titulo</label>
                            <input type="text" name="title" class="form-control" id="validTitulo" required>
                            <div class="invalid-feedback">
                                Campo titulo é obrigatório
                            </div>
                        </div> 
                        <div class="col-md-12 mt-2">
                            <label for="validCategory" class="form-label">Categoria</label>
                            <select name="category" class="form-select" id="validCategory" required>
                                <option value="">Selecione uma categoria</option>
                                <option value="1">categoria</option> 
                            </select>
                            <div class="invalid-feedback">Selecione um status</div> 
                        </div> 
                        <div class="col-md-12 mt-2">
                            <label for="validStatus" class="form-label">Status</label>
                            <select name="status" class="form-select" id="validStatus" required>
                                <option value="">Selecione um status</option>
                                <option value="1">A fazer</option>
                                <option value="2">Executando</option>
                                <option value="3">Concluído</option>
                            </select>
                            <div class="invalid-feedback">Selecione um status</div> 
                        </div>  
                        <div class="col-md-12 mt-2">
                            <label for="validUser" class="form-label">Usuário</label>
                            <select name="users_id" class="form-select" id="validUser" required>
                                <option value="">Selecione um usuario</option>
                                <?php foreach($data['users'] as $users): ?>
                                    <option value="<?= $users['id'] ?>"><?= $users['name'] ?></option>  
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Selecione um usuário</div> 
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>
<script src="../assets/js/form-valid.js"></script>