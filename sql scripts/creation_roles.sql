INSERT INTO roles (nom_du_role) VALUES ('ROLE_USER');

INSERT INTO roles (nom_du_role) VALUES ('ROLE_ADMINISTRATEUR');

INSERT INTO roles (nom_du_role) VALUES ('ROLE_NUTRITIONISTE');


INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role_id, nutritionniste_id, age, token) 
VALUES 
-- 123456789
('Toffa', 'kevin', 'kevin.toffa@manger.com', '25f9e794323b453885f5181f1b624d0b', 1, NULL, 30, NULL),
-- 987654321
('Abdoulaye', 'mamadou', 'mamadou.abdoulaye@example.com', '6ebe76c9fb411be97b3b0d48b791a7c9', 2, NULL, 25, NULL),
-- 000000000
('Hasinianina', 'andriamahefatsihoarana', 'parfait.hefatsi@example.com', '25f9e794323b453885f5181f1b624d0b', 2, NULL, 35, NULL);