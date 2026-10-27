<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar produto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <main class="container py-5">
    <div class="mb-4 d-flex justify-content-between align-items-center">
      <h1>Editar produto</h1>
      <a href="/produtos" class="btn btn-outline-secondary">Voltar</a>
    </div>

    <div class="w-50 mt-2">
      <form action="/atualizar_produto" method="POST">
        <input type="hidden" name="id" value="<?= (int) $data['produto']['id'] ?>">

        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required
            value="<?= htmlspecialchars($data['produto']['nome'], ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição:</label>
          <textarea class="form-control" id="descricao" name="descricao" style="resize:none;" rows="5"><?= htmlspecialchars($data['produto']['descricao'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>

        <div class="row">
          <div class="mb-3 col-4">
            <label for="categoriaId" class="form-label">Categoria Id:</label>
            <input type="number" class="form-control" id="categoriaId" name="categoria_id" min="1" required
              value="<?= (int) $data['produto']['categoria_id'] ?>">
          </div>
          <div class="mb-3 col-4">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" min="0" required
              value="<?= (int) $data['produto']['quantidade_disponivel'] ?>">
          </div>
          <div class="mb-3 col-4">
            <label for="valor" class="form-label">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" min="0" step="0.01" required
              value="<?= htmlspecialchars((string) $data['produto']['valor'], ENT_QUOTES, 'UTF-8') ?>">
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
      </form>
    </div>
  </main>
</body>

</html>
