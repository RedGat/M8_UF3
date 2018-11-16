
1.Instal·lem mysql i comprovem que estigui actualitzat.

2. Descarreguem la base de dades World, que trobarem a https://dev.mysql.com/do$

3. La base de dades ens arribarà comprimida, caldrà descomprimir-la.

4. Per poder treballar-hi, caldrà crear un usuari amb la seva respectiva contra$

5. També haurem d'importar la base de dades amb la comanda:

        "sudo mysql -u [nom d'usuari] -p world < world.sql"

6. Finalment instal·larem el PHP pel mysql.

sudo apt-install php-mysql


