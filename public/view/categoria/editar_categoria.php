<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar categoria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <main class="container py-5">
    <div class="mb-4 d-flex justify-content-between align-items-center">
      <h1>Editar categoria</h1>
      <a href="/categorias" class="btn btn-outline-secondary">Voltar</a>
    </div>

    <div class="w-50 mt-2">
      <form action="/atualizar_categoria" method="POST">
        <input type="hidden" name="id" value="<?= (int) $data['categoria']['id'] ?>">

        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" maxlength="50" required
            value="<?= htmlspecialchars($data['categoria']['nome'], ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
      </form>
    </div>
  </main>
</body>

</html>
