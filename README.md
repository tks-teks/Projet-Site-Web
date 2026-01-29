# NovaCommerce — Plateforme e-commerce (JS + Laravel)

Ce dépôt fournit une base front-end (JavaScript) et back-end (Laravel) pour une plateforme e-commerce professionnelle, sécurisée et évolutive.

## Structure du projet
```
frontend/              # Landing page animée + UI marketing (JS/CSS)
backend/               # Backend Laravel (routes, modèles, migrations)
ARCHITECTURE_ECOMMERCE.md
```

## Front-end (JavaScript)
- Landing page animée et responsive.
- Dashboards dédiés (Admin, Vendeur, Gestionnaire).
- Animations CSS + compteur en JS.

Pour démarrer localement :
```
cd frontend
# ouvrir index.html dans votre navigateur
```

Pages disponibles :
- `index.html` (landing)
- `admin.html` (dashboard administrateur)
- `seller.html` (dashboard vendeur)
- `manager.html` (dashboard gestionnaire)

## Back-end (Laravel)
- Routes API REST v1 (auth, utilisateurs, rôles, permissions, produits, commandes, audit).
- Modèles Eloquent pour RBAC + catalogue + commandes.
- Migrations pour la base de données.

Pour initialiser Laravel (si nécessaire) :
```
composer create-project laravel/laravel backend
# puis remplacer/ajouter les fichiers fournis ici
```

## Base de données
- Schéma SQL disponible : `backend/database/sql/schema.sql`.
- Migrations Laravel disponibles dans `backend/database/migrations/`.

## Prochaines étapes
- Implémenter l’authentification (Sanctum/Passport).
- Ajouter la gestion des permissions par middleware.
- Déployer un tableau de bord admin (React/Vue) connecté aux APIs.
