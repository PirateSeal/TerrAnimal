--  INFORMATIONS
-- AUTEUR : Thomas COUSIN
-- DERNIERE DATE DE MODIFICATION : 28/05/2018

-- Fichier de texte documentant toutes les requetes possibles pour chacune des tables
-- S'il manque une requête, ouvrir une issue sur www.github.com/PirateSeal/TerraBay
-- Pour ce qui est des variables modifiables, elles sont précédées par un "$" 
-- Une requête est fonctionnelle et testée lorsqu'elle est marquée d'un "✔"

-- USERS
    -- ajouter un user ✔
        INSERT INTO users (`pseudo`, 'email', `firstname`, `name`, `note`, `password`, `balance`, `status`)
        VALUES ('$pseudo', '$email', '$firstname', '$name', '$note', '$password', '$balance', '$status');
        
    -- afficher toutes les infos d'un user ✔
        SELECT * 
        FROM users 
        WHERE pseudo LIKE $pseudo;

    -- acceder au compte ✔
        SELECT pseudo, users.password 
        FROM users 
        WHERE pseudo LIKE '$pseudo' AND users.password LIKE '$password';

    -- afficher valeur portefeuille ✔
        SELECT pseudo, balance 
        FROM users
        WHERE pseudo LIKE '$pseudo';

    -- Changer la valeur du portefeuille ✔
        update 'users' 
        SET 'balance' = $chiffre 
        WHERE pseudo LIKE '$pseudo';

    -- Changer le pseudo ou mot de passe ✔
        update 'users' 
        SET 'pseudo' | 'password' = '$pseudo' | '$password' 
        WHERE pseudo LIKE '$pseudo';

-- ORDERS
    -- Creer une order ✔
        INSERT INTO ORDERS ('id_buyer','id_seller','date')
        VALUES ('$id_buyer','$id_seller','$date');
    
    -- afficher toutes les orders d'un compte ✔
        CREATE VIEW seller AS 
        SELECT users.id_user AS id_seller, users.pseudo
        FROM users JOIN orders
        ON orders.id_seller = users.id_user
        WHERE users.id_user LIKE orders.id_seller;

        CREATE VIEW buyer AS 
        SELECT users.id_user AS id_buyer, users.pseudo
        FROM users JOIN orders
        ON orders.id_buyer = users.id_user
        WHERE users.pseudo LIKE '$pseudo';
        
        SELECT * 
        FROM buyer JOIN seller JOIN orders 
        ON orders.id_buyer = buyer.id_user AND orders.id_seller = seller.id_seller
        ORDER BY id_order;

    -- Afficher tout le contenu d'une commande
        CREATE VIEW order AS
        SELECT orders.id_order, orders_lines.id_article, quantity, total_price AS article_total_price
        FROM orders JOIN orders_lines JOIN articles
        ON orders.id_order = orders_lines.id_order AND orders_lines.id_article = articles.id_article
        WHERE id_order = '$number_order';

-- ORDERS_LINE
    -- Créer une order_line ✔
        INSERT INTO orders_lines ('id_order','id_article','quantity','total_price')
        VALUES ('$id_order','$id_article','$quantity','$total_price');

-- ARTICLES
    -- ajouter un article ✔
        INSERT INTO articles (`id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`) 
        VALUES ('$specie', '$user', '$desc', '$price', '$stock', '$gender', '$diet', '$weight', '$size', '$color', '$age');

    -- montrer tous les articles d'un user ✔
        SELECT u.id_user, u.pseudo, a.description,  s.name AS specie, unit_price, stock, gender, diet, a.weight, size, color, age 
        FROM species AS s JOIN articles AS a JOIN users AS u 
        ON s.id_specie = a.id_specie AND u.id_user = a.id_user 
        WHERE u.id_user = '$id_user' 
        ORDER BY ID_article;

    -- montrer tous les articles d'une espèce ✔
        SELECT *
        FROM articles 
        WHERE id_specie = '$id_specie' 
        ORDER BY ID_article;

    -- montrer tous les articles ayant une certaine diet ✔
        SELECT * 
        FROM articles 
        WHERE diet = 'herbivorous' | 'carnivorous' | 'omnivorous' --retirer mention inutile 
        ORDER BY ID_article;

    -- montrer tous les articles d'une espèce appartenant à un certain utilisateur ✔
        SELECT u.id_user, u.pseudo, a.description, s.name AS specie, a.diet, a.weight, a.size, a.color, a.age, a.stock, a.unit_price 
        FROM species AS s JOIN articles AS a JOIN users AS u 
        ON s.id_specie = a.id_specie AND u.id_user = a.id_user 
        WHERE u.id_user = $id_user AND s.name = $specie 
        ORDER BY ID_article;

-- SPECIES
    -- ajouter une specie ✔
        INSERT INTO species ('name')
        VALUES ('$specie');

-- VIEWS
    -- créer une view pour offre du jour ✔
        CREATE VIEW daily AS 
        SELECT * FROM articles 
        WHERE ID_article = '$ID_article';

        update daily 
        SET unit_price = unit_price-(unit_price/10);

--