<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
    
        <main>
                <form action="/login" method="POST" class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                                    <h3 class="card-title h5 mb-1 text-dark">Connexion</h3>
                                    <p class="text-muted small mb-0">Veuillez saisir vos informations de connexion.</p>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-dark fw-medium">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="EX:  ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-dark fw-medium">Mot de passe</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="EX:  ">
                                    </div>
                                    <div class="d-flex justify-content-end gap-2 bg-light p-3 mx    -n4 mb-n4 border-top">
                                        <button type="submit" class="btn btn-primary">Se connecter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
