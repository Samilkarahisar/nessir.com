# nessir.com
Nessir était un site permettant aux utilisateurs d'écrire des nouvelles ensemble, chacun son tour. 

Chaque fois qu'un utilisateur crée une nouvelle, on crée un fichier du nom "nouvelle.txt".

Ensuite les autres utilisateurs peuvent ouvrir ce fichier et continuer la suite de la nouvelle. Cependant pour que le systeme fonctionne, je devais mettre deux restrictions, tout d'abord les utilisateurs ne peuvent supprimer ce qui a été ajouté par un autre utilisateur, donc quand un utilisateur continuer une nouvelle, la partie qu'il écrit devient définitivement une partie de l'histoire. 
Pour mettre cette restriction, j'ai du créer une application web qui jouait le role d'editeur texte permettant seulement d'ajouter la suite au fichier .txt, et non pas d'editer le reste du fichier comme le permet les editeurs usuelles.

Puis, si plusieurs utilisateurs essayent d'ecrire à un meme fichier, on laisse le premier faire et les autres utilisateurs sont envoyés dans une file d'attente qui les redirectera à l'editeur de fichier dés que le premier a fini d'écrire sa part. 



