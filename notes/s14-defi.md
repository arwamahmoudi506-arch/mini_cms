# Session 14 - Défi

Connexion enregistre le jeton toute seule : oui (script Post-response de la requête Connexion, pm.collectionVariables.set)
Créer un article répond 201 sans copier le jeton : oui (Bearer {{token}} hérité de la collection)
Le fichier exporté ne contient aucun jeton : oui (la variable token a une valeur vide)

Le dépôt est public. Que risquez-vous si le fichier exporté contient un jeton, et comment l'annuler ?

N'importe qui peut agir en mon nom (créer, modifier, supprimer mes articles) tant que le jeton n'est pas révoqué ; par défaut, un jeton Sanctum n'expire jamais. Pour l'annuler : appeler POST /api/logout avec ce jeton, ou supprimer sa ligne dans la table personal_access_tokens.

Pourquoi les écritures de l'API passent-elles par les Form Requests et PostPolicy plutôt que par des règles écrites dans Api\PostController ?

Une seule règle sert les deux portes : un changement de StorePostRequest, UpdatePostRequest ou PostPolicy s'applique au site et à l'API en même temps, et les deux ne peuvent jamais se contredire.
