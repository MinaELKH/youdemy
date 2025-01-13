
INSERT INTO users (email, password, name, avatar, id_role) VALUES
('user1@example.com', 'password1', 'User One', 'avatar1.jpg', 1),  -- admin
('user2@example.com', 'password2', 'User Two', 'avatar2.jpg', 2),  -- teacher
('user3@example.com', 'password3', 'User Three', 'avatar3.jpg', 3), -- student
('user4@example.com', 'password4', 'User Four', 'avatar4.jpg', 2),  -- teacher
('user5@example.com', 'password5', 'User Five', 'avatar5.jpg', 1);  -- admin


INSERT INTO roles (role) VALUES ('admin');
INSERT INTO roles (role) VALUES ('teacher');
