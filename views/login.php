<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sistema de Inventario</title>
</head>

<body>

<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            
            <div class="card bg-dark shadow-lg rounded-4 p-4">
                <div class="card-body">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-white">Inicio de Sesión</h2>
                    </div>
                    
                    <form method="POST" action="?route=login">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-white">Email</label>
                            <input type="email" name="email" 
                                   class="form-control border-secondary py-2" 
                                   placeholder="nombre@ejemplo.com" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-white">Password</label>
                            <input type="password" name="password" 
                                   class="form-control border-secondary py-2" 
                                   placeholder="••••••••" required>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button class="btn btn-outline-light fw-bold py-2 shadow-sm" type="submit">
                                Entrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>