# intranet
L�installation ��������������

L�installation est des plus basiques, il suffit de cloner le d�p�t Github en local.

	Telecharger et installer git .
	Lancer git bash dans un dossier vide
	faire git clone https://github.com/ftardieu/intranet.git

Installer php : 
	-Telecharger et installer php.
	-L'ajouter dans les variables d'environnements.

Installer composer car le projet est r�alis� sous Symfony :

	-Telecharger et installer composer.
		
	-Se mettre � la racine du projet avec un invit� de commande et taper composer install .
	
	-Il se peut qu'il y ai une �rreur SSL , pour cela il faut se ref�rer aux docs sur internet de wamp ou easyphp ( une extension a activer)
	
	-Il peut aussi y avoir des probl�mes de caches : pour cel� taper app/console cache:clear --no-warmup


Installer la base de donn�es : 

	- Param�trer le fichier parameters.yml dans app/config
	- Cr�er une base de donn�es nomm� intranet.
	- toujours � la racine du projet , taper la commande : php app/console doctrine:schema:update --force 
	-la base de donn�es est maintenant op�rationnel.

Cr�er un utilisateur :

	-php app/console fos:user:create admin --super-admin