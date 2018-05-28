DELETE FROM species;
INSERT INTO species (`id_specie`, `name`) VALUES ('1', 'felines'), ('2', 'canides');
DELETE FROM articles;
INSERT INTO articles (`id_article`, `id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`) VALUES ('1', '1', '1', 'Chat', '250', '3', '1', 'carnivorous', '3', '0.1', 'red', '2');