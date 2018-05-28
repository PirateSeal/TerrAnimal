/*
    Fichier de texte documentant toutes les requetes possibles
    
    pour ce qui est des variables modifiables, elles sont précédées
    par un $ 
*/

-- acceder au compte
select pseudo, password 
FROM users 
WHERE $pseudo = pseudo AND $password = password;

-- accéder au portefeuille
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

-- ajouter un article
INSERT INTO articles (`id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`) 
VALUES ('$specie', '$user', '$desc', '$price', '$stock', '$gender', '$diet', '$weight', '$size', '$color', '$age');

-- montrer tous les articles d'un user
SELECT u.id_user, u.pseudo, a.description,  s.name AS specie, unit_price, stock, gender, diet, a.weight, size, color, age 
FROM species AS s join articles AS a join users AS u 
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
WHERE diet = 'herbivorous' | 'carnivorous' | 'omnivorous' 
ORDER BY ID_article;

-- montrer tous les articles d'une espèce appartenant à un certain utilisateur
SELECT u.id_user, u.pseudo, a.description, s.name AS specie, a.diet, a.weight, a.size, a.color, a.age, a.stock, a.unit_price 
FROM species AS s join articles AS a join users AS u 
ON s.id_specie = a.id_specie AND u.id_user = a.id_user 
WHERE u.id_user = $id_user AND s.name = $specie 
ORDER BY ID_article;

-- ajouter un user
INSERT INTO users (
    `pseudo`, `firstname`, `name`, `note`, `password`, `balance`, `status`
) 
VALUES (
    '$pseudo', '$firstname', '$name', '$note', '$password', '$balance', '$status'
);

-- créer une view pour offre du jour 
CREATE VIEW daily AS 
SELECT * FROM articles 
WHERE ID_article = $ID_article;

update daily 
SET unit_price = unit_price-(unit_price/10);

