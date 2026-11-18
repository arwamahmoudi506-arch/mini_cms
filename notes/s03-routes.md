# Session 03 - Routes, contrôleurs et layout

## Défi

URL produite par `route('about')` :

`/a-propos`

URL produite par `route('posts.show', 'routes-et-controleurs')` :

`/posts/routes-et-controleurs`

URL produite par `route('posts.archive', 2025)` :

`/posts/archive/2025`

Pourquoi `/posts/archive/abc` et `/posts/article-inconnu` répondent toutes deux 404, et quelle ligne de code en est responsable dans chaque cas ?

- `/posts/archive/abc` : la contrainte `whereNumber('year')` refuse `abc` car ce n'est pas un nombre. Laravel répond 404.
- `/posts/article-inconnu` : le slug respecte la contrainte, mais l'article n'existe pas dans le tableau. `abort(404)` dans la méthode `show()` du contrôleur provoque la 404.

Que se passe-t-il si une vue appelle `route('posts.show')` sans paramètre ?

Laravel déclenche une `UrlGenerationException`, car la route `posts.show` exige le paramètre `slug` pour construire l'URL.