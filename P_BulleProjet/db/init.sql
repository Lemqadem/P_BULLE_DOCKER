CREATE TABLE t_utilisateur(
utilisateur_id INT AUTO_INCREMENT,
prenom VARCHAR(254) NOT NULL,
nom VARCHAR(254) NOT NULL,
repas_prefere VARCHAR(254) NOT NULL,
animal_totem VARCHAR(254) NOT NULL,
email VARCHAR(254) NOT NULL,
PRIMARY KEY(utilisateur_id),
UNIQUE(email)
);