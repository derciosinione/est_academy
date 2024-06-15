CREATE DATABASE IF NOT EXISTS est_academy;

USE est_academy;

-- drop database est_academy;

CREATE TABLE IF NOT EXISTS Profiles(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsStaff BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS Users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Username VARCHAR(30) UNICODE DEFAULT NULL,
    Nif varchar(20) UNIQUE DEFAULT NULL,
    Email VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(20),
    AvatarUrl TEXT DEFAULT NULL,
    BirthDay DATE DEFAULT NULL,
    PasswordHash TEXT,
    IsApproved BOOL DEFAULT FALSE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    ProfileId INT,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (ProfileId) REFERENCES Profiles(Id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS Categories(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS Courses(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50),
    Price DECIMAL(11,2) DEFAULT 0,
    MaxStudent INT DEFAULT 30,
    Description TEXT,
    CategoryId INT,
    CreatorId INT,
    ImageUrl TEXT DEFAULT 'coursebg.png',
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    UNIQUE (Name, CreatorId),
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE RESTRICT,
    FOREIGN KEY (CategoryId) REFERENCES Categories(Id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS EnrollmentsStatus(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS StudentEnrollments(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    StudentId INT,
    CourseId INT,
    EnrollmentsStatusId INT,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (StudentId) REFERENCES Users(Id) ON DELETE RESTRICT,
    FOREIGN KEY (CourseId) REFERENCES Courses(Id) ON DELETE RESTRICT,
    FOREIGN KEY (EnrollmentsStatusId) REFERENCES EnrollmentsStatus(Id) ON DELETE RESTRICT
);


/*
CREATE TABLE IF NOT EXISTS Class(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    CourseId INT,
    TeacherId INT,
    Code VARCHAR(40) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (CourseId) REFERENCES Courses(Id) ON DELETE RESTRICT,
    FOREIGN KEY (TeacherId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS StudentClass(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    ClassId INT,
    StudentEnrollmentId INT UNIQUE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (StudentEnrollmentId) REFERENCES StudentEnrollments(Id),
    FOREIGN KEY (ClassId) REFERENCES Class(Id)
);
*/


-- PROFILES
INSERT INTO Profiles (Id, Name, IsActive, IsStaff, IsDeleted, CreatedAt, UpdatedAt) VALUES
(1, 'Aluno', TRUE, FALSE, FALSE, NOW(), NOW()),
(2, 'Docente', TRUE, TRUE, FALSE, NOW(), NOW()),
(3, 'Administrador', TRUE, TRUE, FALSE, NOW(), NOW());


-- USERS

INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('João Aluno', 'joao.aluno@email.com', 'senha_aluno', TRUE, TRUE, FALSE, 1, NOW(), NOW());

INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Maria Docente', 'maria.docente@email.com', 'senha_docente', TRUE, TRUE, FALSE, 2, NOW(), NOW());


INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Dercio Sinione', 'dercio.sinione@email.com', 'senha_admin', TRUE, TRUE, FALSE, 3, NOW(), NOW());

INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Carlos Administrador', 'carlos.admin@email.com', 'senha_admin', TRUE, TRUE, FALSE, 3, NOW(), NOW());

-- ALUNOS

INSERT INTO Users (Id, Name, Username, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt)
VALUES
    (4,'admin', 'admin', 'admin@gmail.com', '+55123123123', NULL, '1992-05-01', 'admin', TRUE, TRUE, FALSE, 3, NOW(), NOW()),
    (3,'Dercio Sinione', 'derciosinione', 'derciodd@gmail.com', '+5512123', NULL, '1992-05-01', 'admin', TRUE, TRUE, FALSE, 3, NOW(), NOW()),
    (2,'docente', 'docente', 'docente@gmail.com', '+55123123312', NULL, '1992-05-01', 'docente', TRUE, TRUE, FALSE, 2, NOW(), NOW()),
    (1,'aluno', 'aluno', 'aluno@gmail.com', '+551231232', NULL, '1992-05-01', 'aluno', TRUE, TRUE, FALSE, 1, NOW(), NOW());

INSERT INTO Users (Name, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt)
VALUES
('Maria Silva', 'maria.silva@example.com', '+55123456789', NULL, '1995-07-15', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Carla Almeida', 'carla.almeida@example.com', '+55345678901', NULL, '1994-09-10', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Pedro Lima', 'pedro.lima@example.com', '+55456789012', NULL, '1997-05-25', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Ana Rodrigues', 'ana.rodrigues@example.com', '+55567890123', NULL, '1996-11-30', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Rafaela Oliveira', 'rafaela.oliveira@example.com', '+55678901234', NULL, '1993-04-05', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Fernando Costa', 'fernando.costa@example.com', '+55789012345', NULL, '1992-08-12', 'senha456', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Gustavo Pereira', 'gustavo.pereira@example.com', '+55890123456', NULL, '1999-01-18', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Patrícia Silva', 'patricia.silva@example.com', '+55901234567', NULL, '1991-03-22', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Mariana Santos', 'mariana.santos@example.com', '+55123123456', NULL, '1990-06-14', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Roberto Santos', 'roberto.santos@example.com', '+55987878787', NULL, '1991-09-08', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Marcelo Lima', 'marcelo.lima@example.com', '+55234343434', NULL, '1993-08-14', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW());


INSERT INTO Categories (Id, Name, IsActive, IsDeleted, CreatorId, CreatedAt, UpdatedAt) VALUES
(8, 'Banco de Dados', TRUE, FALSE, 3, NOW(), NOW()),
(10, 'Ciência de Dados', TRUE, FALSE, 3, NOW(), NOW()),
(11, 'Cloud Computing', TRUE, FALSE, 3, NOW(), NOW()),
(13, 'Desenvolvimento de Aplicativos Móveis', TRUE, FALSE, 3, NOW(), NOW()),
(7, 'Desenvolvimento Web', TRUE, FALSE, 3, NOW(), NOW()),
(1, 'Diversos', TRUE, FALSE, 3, NOW(), NOW()),
(5, 'Gestão', TRUE, FALSE, 3, NOW(), NOW()),
(2, 'História', TRUE, FALSE, 3, NOW(), NOW()),
(6, 'Matemática', TRUE, FALSE, 3, NOW(), NOW()),
(3, 'Programação', TRUE, FALSE, 3, NOW(), NOW()),
(4, 'Robótica', TRUE, FALSE, 3, NOW(), NOW()),
(9, 'Segurança da Informação', TRUE, FALSE, 3, NOW(), NOW()),
(12, 'Sistemas Operacionais', TRUE, FALSE, 3, NOW(), NOW());

INSERT INTO Courses (Name, MaxStudent, CategoryId, CreatorId, IsActive, IsDeleted, CreatedAt, UpdatedAt)
VALUES
    ('Introdução ao Desenvolvimento Web', 25, 3, 3, TRUE, FALSE, NOW(), NOW()),
    ('Python para Iniciantes', 30, 3, 3, TRUE, FALSE, NOW(), NOW()),
    ('JavaScript Avançado: Fundamentos e Práticas', 20, 3, 3, TRUE, FALSE, NOW(), NOW()),
    ('Iniciação à Robótica com Arduino', 15, 4, 3, TRUE, FALSE, NOW(), NOW()),
    ('Robótica Industrial: Automação e Controle', 20, 4, 3, TRUE, FALSE, NOW(), NOW()),
    ('Inteligência Artificial em Robótica', 15, 4, 3, TRUE, FALSE, NOW(), NOW()),
    ('Cálculo Diferencial e Integral', 25, 6, 3, TRUE, FALSE, NOW(), NOW()),
    ('Estatística Aplicada', 20, 6, 3, TRUE, FALSE, NOW(), NOW()),
    ('HTML5 e CSS3: Construindo Páginas Web', 25, 7, 3, TRUE, FALSE, NOW(), NOW()),
    ('JavaScript Avançado: Frameworks e Bibliotecas', 20, 7, 3, TRUE, FALSE, NOW(), NOW()),
    ('PHP para Desenvolvimento Web', 20, 7, 3, TRUE, FALSE, NOW(), NOW()),
    ('Introdução ao MySQL', 25, 8, 3, TRUE, FALSE, NOW(), NOW()),
    ('Modelagem de Dados com SQL', 20, 8, 3, TRUE, FALSE, NOW(), NOW()),
    ('Administração de Bancos de Dados', 20, 8, 3, TRUE, FALSE, NOW(), NOW()),
    ('Fundamentos de Segurança Cibernética', 30, 9, 3, TRUE, FALSE, NOW(), NOW()),
    ('Ethical Hacking e Teste de Invasão', 25, 9, 3, TRUE, FALSE, NOW(), NOW()),
    ('Criptografia e Segurança de Redes', 20, 9, 3, TRUE, FALSE, NOW(), NOW());

INSERT INTO EnrollmentsStatus (Id, Name, IsActive, IsDeleted, CreatorId, CreatedAt, UpdatedAt)
VALUES
(1, 'Pendente', TRUE, FALSE, 3, NOW(), NOW()),
(2, 'Aprovado', TRUE, FALSE, 3, NOW(), NOW()),
(3, 'Recusado', TRUE, FALSE, 3, NOW(), NOW()),
(4, 'Cancelado', TRUE, FALSE, 3, NOW(), NOW());


INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
    (7, 3, 1, FALSE, NOW(), NOW()),
    (7, 5, 2, FALSE, NOW(), NOW()),
    (7, 7, 1, FALSE, NOW(), NOW());


UPDATE Users SET PasswordHash='123456' WHERE Id>4;

UPDATE Users SET AvatarUrl='studentavatar.jpg' WHERE ProfileId=1;

UPDATE Users SET AvatarUrl='docent-avatar.jpg' WHERE ProfileId in (2,3);

UPDATE Users SET Username=trim(Username), Email=trim(Email), PasswordHash=md5(PasswordHash) WHERE Id!=0;