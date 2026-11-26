# Session 12 - Défi

1. Pourquoi role n'est-il pas dans #[Fillable], et comment votre contrôleur le modifie-t-il quand même ?

Hors de #[Fillable], role reste protégé de l'affectation de masse : un champ role ajouté à la main à un formulaire, ou un contrôleur qui passerait un jour $request->all() à create(), ne peut pas créer un administrateur. UserController::updateRole affecte l'attribut lui-même ($user->role = ...), à partir d'une valeur validée par la règle in:author,admin et après la vérification de UserPolicy::updateRole, puis appelle save().

2. Pourquoi le callback de Gate::before doit-il renvoyer null, et non false, pour un auteur ?

false est une réponse définitive : Laravel refuserait alors tout à un auteur, même la modification de ses propres articles. null veut dire « pas d'avis » : Laravel continue et demande au Gate ou à la méthode de la Policy concernés. Pour la même raison, le callback renvoie null pour la capacité updateRole, afin qu'un administrateur ne puisse pas changer son propre rôle.
