# intranet
L段nstallation 覧覧覧覧覧覧覧

L段nstallation est des plus basiques, il suffit de cloner le d駱�t Github en local.

	Telecharger et installer git .
	Lancer git bash dans un dossier vide
	faire git clone https://github.com/ftardieu/intranet.git

Installer php : 
	-Telecharger et installer php.
	-L'ajouter dans les variables d'environnements.

Installer composer car le projet est r饌lis� sous Symfony :

	-Telecharger et installer composer.
		
	-Se mettre � la racine du projet avec un invit� de commande et taper composer install .
	
	-Il se peut qu'il y ai une 駻reur SSL , pour cela il faut se ref駻er aux docs sur internet de wamp ou easyphp ( une extension a activer)
	
	-Il peut aussi y avoir des probl鑪es de caches : pour cel� taper app/console cache:clear --no-warmup


Installer la base de donn馥s : 

	- Param騁rer le fichier parameters.yml dans app/config
	- Cr馥r une base de donn馥s nomm� intranet.
	- toujours � la racine du projet , taper la commande : php app/console doctrine:schema:update --force 
	-la base de donn馥s est maintenant op駻ationnel.

Cr馥r un utilisateur :

	-php app/console fos:user:create admin --super-admin