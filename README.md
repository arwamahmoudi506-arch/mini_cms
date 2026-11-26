## État actuel (tag lab-08)

- `GET /api/categories` et `GET /api/categories/{category}`, avec le nombre d'articles publiés de chaque catégorie.
- `GET /api/posts?category=<slug>&tag=<slug>` : filtres par catégorie et par tag, comparaison exacte, slug inconnu refusé (422).
- `POST /api/login` renvoie un jeton Sanctum ; `POST /api/logout` le révoque.
- `POST`, `PUT/PATCH` et `DELETE /api/posts` protégés par `auth:sanctum`, avec les mêmes Form Requests et la même `PostPolicy` que le site (401, 403 et 422 en JSON).
- Tests Pest `ApiReadTest` et `ApiWriteTest`.

## Routes disponibles

| Méthode | URI | Nom | Action |
|---|---|---|---|
| GET | `/` | `home` | `PageController@home` |
| GET | `/a-propos` | `about` | `PageController@about` |
| GET | `/heure` | `time` | `PageController@time` |
| GET | `/posts` | `posts.index` | `PostController@index` |
| GET | `/posts/archive/{year}` | `posts.archive` | `PostController@archive` |
| GET | `/posts/categorie/{category:slug}` | `posts.category` | `PostController@byCategory` |
| GET | `/posts/tag/{tag:slug}` | `posts.tag` | `PostController@byTag` |
| GET | `/posts/create` | `posts.create` | `PostController@create` |
| POST | `/posts` | `posts.store` | `PostController@store` |
| GET | `/posts/{post}` | `posts.show` | `PostController@show` |
| GET | `/posts/{post}/edit` | `posts.edit` | `PostController@edit` |
| PUT | `/posts/{post}` | `posts.update` | `PostController@update` |
| DELETE | `/posts/{post}` | `posts.destroy` | `PostController@destroy` |
| PATCH | `/posts/{post}/publication` | `posts.publication` | `PostController@togglePublication` |
| GET | `/admin/categories` | `admin.categories.index` | `CategoryController@index` |
| GET | `/admin/categories/create` | `admin.categories.create` | `CategoryController@create` |
| POST | `/admin/categories` | `admin.categories.store` | `CategoryController@store` |
| GET | `/admin/categories/{category}/edit` | `admin.categories.edit` | `CategoryController@edit` |
| PUT | `/admin/categories/{category}` | `admin.categories.update` | `CategoryController@update` |
| DELETE | `/admin/categories/{category}` | `admin.categories.destroy` | `CategoryController@destroy` |
| GET | `/admin/tags` | `admin.tags.index` | `TagController@index` |
| GET | `/admin/tags/create` | `admin.tags.create` | `TagController@create` |
| POST | `/admin/tags` | `admin.tags.store` | `TagController@store` |
| GET | `/admin/tags/{tag}/edit` | `admin.tags.edit` | `TagController@edit` |
| PUT | `/admin/tags/{tag}` | `admin.tags.update` | `TagController@update` |
| DELETE | `/admin/tags/{tag}` | `admin.tags.destroy` | `TagController@destroy` |
| GET | `/inscription` | `register` | `Auth\RegisterController@create` |
| POST | `/inscription` | `register.store` | `Auth\RegisterController@store` |
| GET | `/connexion` | `login` | `Auth\LoginController@create` |
| POST | `/connexion` | `login.store` | `Auth\LoginController@store` |
| POST | `/deconnexion` | `logout` | `Auth\LoginController@destroy` |
| GET | `/mes-articles` | `my-posts` | `PostController@myPosts` |
| GET | `/admin/utilisateurs` | `admin.users.index` | `UserController@index` |
| PATCH | `/admin/utilisateurs/{user}/role` | `admin.users.role` | `UserController@updateRole` |
| GET | `/api/posts` | `api.posts.index` | `Api\PostController@index` |
| GET | `/api/posts/{post}` | `api.posts.show` | `Api\PostController@show` |
| GET | `/api/categories` | `api.categories.index` | `Api\CategoryController@index` |
| GET | `/api/categories/{category}` | `api.categories.show` | `Api\CategoryController@show` |
| POST | `/api/login` | `api.login` | `Api\AuthController@login` |
| POST | `/api/logout` | `api.logout` | `Api\AuthController@logout` |
| POST | `/api/posts` | `api.posts.store` | `Api\PostController@store` |
| PUT/PATCH | `/api/posts/{post}` | `api.posts.update` | `Api\PostController@update` |
| DELETE | `/api/posts/{post}` | `api.posts.destroy` | `Api\PostController@destroy` |

## Captures d'écran

### Session 01 à 04

![Bienvenue](screenshots/s01-bienvenue.png)

![À propos](screenshots/s02-a-propos.png)

![Accueil](screenshots/s03-accueil.png)

![Liste des articles](screenshots/s03-articles.png)

![Détail d'un article](screenshots/s03-article.png)

![Articles](screenshots/s04-articles.png)

### Session 05

![Liste paginée des articles](screenshots/s05-articles.png)

![Formulaire avec erreurs de validation](screenshots/s05-formulaire.png)

### Session 06

![Bienvenue](screenshots/s06-bienvenue.png)

![Modification](screenshots/s06-modification.png)

### Session 07

![Détail avec tags](screenshots/s07-detail-tags.png)

![Liste avec relations](screenshots/s07-liste-relations.png)

### Session 08

![Formulaire avec relations](screenshots/s08-formulaire-relations.png)

![Page catégorie](screenshots/s08-page-categorie.png)

### Session 09

![Page d'un article avec le message flash « Article créé. »](screenshots/s09-message-flash.png)

![Page Article introuvable pour un identifiant inexistant](screenshots/s09-article-introuvable.png)

### Session 10

Back-office des catégories et des tags, messages de validation en français, pages 404 et 503 dans le layout du site.

![Formulaire de catégorie envoyé vide, avec les messages de validation en français](screenshots/s10-validation.png)

![Page 404 du site pour une adresse inconnue](screenshots/s10-404.png)

### Session 11

![Barre de navigation d'un utilisateur connecté, avec le message « Vous êtes connecté. »](screenshots/s11-connexion.png)

![Page 403 quand un auteur ouvre la modification de l'article d'un autre auteur](screenshots/s11-interdit.png)

### Session 12

![Page 403 « Réservé aux administrateurs. » pour un compte auteur sur /admin/tags](screenshots/s12-admin-interdit.png)

![Barre de navigation d'un compte auteur, sans les liens Catégories et Tags](screenshots/s12-menu-auteur.png)

### Session 13

![Postman : réponse JSON de GET /api/posts?per_page=2, avec data, links et meta](screenshots/s13-postman-liste.png)

![Postman : réponse 422 de GET /api/posts?per_page=500, avec le message en français](screenshots/s13-postman-422.png)

### Session 14

![Postman : POST /api/posts avec un jeton Bearer, onglet Body, réponse 201 Created](screenshots/s14-postman-201.png)

![Postman : PUT sur l'article d'un autre auteur, réponse 403](screenshots/s14-postman-403.png)

## Comparaison avec le starter kit Livewire

| Critère | Mini-CMS (authentification manuelle) | Starter kit Livewire |
|---|---|---|
| Routes d'authentification | `routes/web.php` (`/inscription`, `/connexion`, `/deconnexion`) | enregistrées par Fortify depuis son paquet ; absentes de `routes/web.php` |
| Inscription | `app/Http/Controllers/Auth/RegisterController.php`, `app/Http/Requests/RegisterRequest.php`, `resources/views/auth/register.blade.php` | `app/Actions/Fortify/CreateNewUser.php` (`Validator::make` puis `User::create`) et `resources/views/pages/auth/register.blade.php` |
| Connexion | `app/Http/Controllers/Auth/LoginController.php` (`store` : `Auth::attempt`, `regenerate`), `app/Http/Requests/LoginRequest.php` | contrôleur de Fortify et `resources/views/pages/auth/login.blade.php` |
| Déconnexion | `app/Http/Controllers/Auth/LoginController.php` (`destroy` : `logout`, `invalidate`, `regenerateToken`) | route `logout` de Fortify ; les mêmes trois opérations dans `app/Livewire/Actions/Logout.php` |
| Limitation des tentatives | aucune | 5 tentatives par minute par e-mail et adresse IP (`app/Providers/FortifyServiceProvider.php`) |
| Mot de passe oublié | absent | `Features::resetPasswords()` dans `config/fortify.php` |
| Vérification de l'e-mail | absente | `Features::emailVerification()`, `MustVerifyEmail` sur `User`, middleware `verified` sur `/dashboard` |
| Double authentification | absente | `Features::twoFactorAuthentication()` et `Features::passkeys()` |
| Rôles et autorisations | colonne `role` (`database/migrations/2026_11_26_082021_add_role_to_users_table.php`), Gates dans `app/Providers/AppServiceProvider.php`, `app/Policies/PostPolicy.php`, `app/Http/Middleware/EnsureUserIsAdmin.php` | aucun : à écrire soi-même |
| Tests | `tests/Feature/AuthTest.php`, `AuthorizationTest.php`, `AdminAccessTest.php`, `PostVisibilityTest.php` | 10 fichiers dans `tests/Feature` (Auth, Settings, Dashboard), écrits avec PHPUnit |

Ce que je garderais du kit dans un vrai projet : la limitation des tentatives de connexion, le mot de passe oublié et la vérification de l'e-mail, qui manquent à Mini-CMS et qu'il serait risqué de réécrire à la main. Les rôles, les Gates et la PostPolicy restent à écrire soi-même dans les deux cas, comme dans cette séance.
