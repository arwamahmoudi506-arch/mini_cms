## État actuel (tag lab-04b)

- Formulaires d'article : catégorie (liste déroulante) et tags (cases à cocher, synchronisés avec `sync()`).
- Pages publiques par catégorie et par tag, liées par slug (`{category:slug}`, `{tag:slug}`).
- Accueil : catégories et tags populaires comptés avec `withCount`, articles publiés seulement.
- Tests Pest : `PostPagesTest`, `PostWriteTest`, `PostRelationsTest` et `PostTaxonomyTest`.

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

![Article introuvable](screenshots/s09-article-introuvable.png)

![Message flash](screenshots/s09-message-flash.png)

### Session 10

![Page 404](screenshots/s10-404.png)

![Validation](screenshots/s10-validation.png)