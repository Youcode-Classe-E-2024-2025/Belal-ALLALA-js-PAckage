INSERT INTO authors (name, email) VALUES
('said said','said.said@gmail.com'),
('salim ouhidi','salim.ouhidi@gmail.com'),
('brahim masklil','brahimMasklil12@gmail.com');

INSERT INTO packages (name, description) VALUES
('My Awesome Package','This is a description of my awesome package.'),
('Another Great Package','This package is even better!'),
('Utility Library','A collection of useful utility functions.');

INSERT INTO versions (package_id, version_number, release_date) VALUES
(1, '1.0.0', '2023-10-26'),
(1, '1.0.1', '2023-11-15'),
(2, '0.5.0', '2023-12-01'),
(3,'2.0.0','2024-01-10');

INSERT INTO collaborations (author_id, package_id) VALUES
(1, 1),
(2, 1),
(2,2),
(1,3),
(3,3);

INSERT INTO users (username, password) VALUES
('admin','admin');