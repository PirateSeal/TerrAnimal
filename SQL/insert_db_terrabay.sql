DELETE FROM users;
INSERT INTO users (`pseudo`, `firstname`, `name`, `password`) VALUES ('Feral','Thomas','Cousin','Oui');

DELETE FROM species;
INSERT INTO species (`name`) VALUES ('felines'), ('canides');

DELETE FROM articles;
INSERT INTO articles (`id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`) VALUES ('1', '1', 'Chat', '250', '3', '1', 'carnivorous', '3', '0.1', 'red', '2');
