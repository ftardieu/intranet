# intranet
L’installation ——————————————

L’installation est des plus basiques, il suffit de cloner le dépôt Github en local.

	Telecharger et installer git .
	Lancer git bash dans un dossier vide
	faire git clone https://github.com/ftardieu/intranet.git

Installer php : 
	-Telecharger et installer php.
	-L'ajouter dans les variables d'environnements.

Installer composer car le projet est réalisé sous Symfony :

	-Telecharger et installer composer.
		
	-Se mettre à la racine du projet avec un invité de commande et taper composer install .
	
	-Il se peut qu'il y ai une érreur SSL , pour cela il faut se reférer aux docs sur internet de wamp ou easyphp ( une extension a activer)
	
	-Il peut aussi y avoir des problèmes de caches : pour celà taper app/console cache:clear --no-warmup


Installer la base de données : 

	- Paramétrer le fichier parameters.yml dans app/config
	- Créer une base de données nommé intranet.
	- toujours à la racine du projet , taper la commande : php app/console doctrine:schema:update --force 
	-la base de données est maintenant opérationnel.

Créer un utilisateur :

	-php app/console fos:user:create admin --super-admin
	
	
Placer le projet dans wamp ou easyphp ( dossier www).

Pour afficher la page d'accueil : localhost/web/app_dev.php/ (mettre le port s'il y en a un après localhost)
