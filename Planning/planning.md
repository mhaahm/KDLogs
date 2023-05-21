*****
 - Les fonctionnalités à faire
   * Il faut que l'application permet d'afficher un tdb de répartition des espace disque
   * L'application permet d'afficher les logs sous forme d'arbre avec catégorisation
   * l'application permet de télécharger un ou plusieurs fichier log
   * l'application permet d'afficher un fichier log ou si la taille est important d'afficher des lignes 
   * l'application permet de rechercher dans un fichier log
   * l'application permet d'écraser le contenu d'un fichier log
   * l'application permet de duppliquer un fichier avec un taille 0
   * L'application permet de sauvegarder des filtres avec des patternes
   * L'application permet de renseigner la config d'un fichier log à prendre en compte
   * La suppression des fichiers doit être permis que pour un profile bien déterminé
 - Conception
   Le menu de l'application se compose des liens suivant
   * Storage
   * Logs
   * Config
   * Filters
 
   La base de données se compose des tables suivant
   * Un table catégorie qui contient la liste des catégorie de log
   * Une tables principale appelé log qui  contient la config des fichiers log
    Chaque log  est lié à une catégorie

 - Planning

   * Intégré le template
   * Créer la base de données

****
