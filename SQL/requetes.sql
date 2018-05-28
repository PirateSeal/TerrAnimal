--  INFORMATIONS
-- AUTEUR : Thomas COUSIN
-- DERNIERE DATE DE MODIFICATION : 28/05/2018

-- Fichier de texte documentant toutes les requetes possibles pour chacune des tables
-- s'il manque une requête, ouvrir une issue sur www.github.com/PirateSeal/TerraBay
-- pour ce qui est des variables modifiables, elles sont précédées par un $ 

-- USERS
    -- ajouter un user
        INSERT INTO users (`pseudo`, 'email', `firstname`, `name`, `note`, `password`, `balance`, `status`)
        VALUES ('$pseudo', '$email', '$firstname', '$name', '$note', '$password', '$balance', '$status');

    -- acceder au compte
        select pseudo, password 
        FROM users 
        WHERE $pseudo = pseudo AND $password = password;

    -- afficher valeur portefeuille
        select pseudo, balance 
        FROM users
        WHERE $pseudo = pseudo;

    -- Changer la valeur du portefeuille
        update 'users' 
        SET 'balance' = $chiffre 
        WHERE $pseudo = pseudo;

    -- Changer le pseudo ou mot de passe
        update 'users' 
        SET 'pseudo' | 'password' = $pseudo | $password 
        WHERE $pseudo = pseudo;

-- ORDERS
    -- Creer une order
        INSERT INTO ORDERS ('id_buyer','id_seller','date')
        VALUES ('$id_buyer','$id_seller','$date');
    
    -- afficher les orders d'un compte
        SELECT id_order, users.pseudo AS buyer, id_seller AS seller, orders.date 
        FROM orders JOIN users 
        ON id_buyer = id_user
        WHERE users.pseudo = '$sessionPseudo'
        ORDER BY id_order;
-- ORDERS_LINE
    -- 
-- ARTICLES
    -- ajouter un article
        INSERT INTO articles (`id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`) 
        VALUES ('$specie', '$user', '$desc', '$price', '$stock', '$gender', '$diet', '$weight', '$size', '$color', '$age');

    -- montrer tous les articles d'un user
        SELECT u.id_user, u.pseudo, a.description,  s.name AS specie, unit_price, stock, gender, diet, a.weight, size, color, age 
        FROM species AS s JOIN articles AS a JOIN users AS u 
        ON s.id_specie = a.id_specie AND u.id_user = a.id_user 
        WHERE u.id_user = $id_user 
        ORDER BY ID_article;

    -- montrer tous les articles d'une espèce
        SELECT *
        FROM articles 
        WHERE id_specie = $id_specie 
        ORDER BY ID_article;

    -- montrer tous les articles ayant une certaine diet
        SELECT * 
        FROM articles 
        WHERE diet = 'herbivorous' | 'carnivorous' | 'omnivorous' --retirer mention inutile 
        ORDER BY ID_article;

    -- montrer tous les articles d'une espèce appartenant à un certain utilisateur
        SELECT u.id_user, u.pseudo, a.description, s.name AS specie, a.diet, a.weight, a.size, a.color, a.age, a.stock, a.unit_price 
        FROM species AS s JOIN articles AS a JOIN users AS u 
        ON s.id_specie = a.id_specie AND u.id_user = a.id_user 
        WHERE u.id_user = $id_user AND s.name = $specie 
        ORDER BY ID_article;

-- SPECIES
    -- ajouter une specie
        INSERT INTO species ('name')
        VALUES ('$specie');

-- VIEWS
    -- créer une view pour offre du jour 
        CREATE VIEW daily AS 
        SELECT * FROM articles 
        WHERE ID_article = $ID_article;

        update daily 
        SET unit_price = unit_price-(unit_price/10);

--